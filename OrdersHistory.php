<html>
    <head>
        <title>Flaming Wings | Orders History</title>
        <?php include("templates/imports.php"); ?>
        <style>

            .divider {
                width: 100%;
                border: 1px lightgray solid;
            }

            .orders {
                margin-top: 20px;
            }

            thead tr th:nth-child(1) {
                width: 100%;
            }

            .box-footer > span {
                float: right;
            }

            .box-body {
                height: 500px;
                overflow-y: scroll;
                overflow-x: auto;
            }

            thead > tr > th:first-child {
                width: 10%;
            }

            thead > tr > th:nth-child(2) {
                width: 85%;
            }

            .selection {
                margin-top: 20px;
                text-align: left;
            }

            .selection > a {
                display: block;
                padding: 4px;
                color: black;
                cursor: pointer;
            }

            .selection > a.active, .selection > a.active:hover {
                color: white;
                background: rgba(225, 72, 53, 1.0);
            }

            .selection > a:hover {
                color: white;
                background: rgba(249, 151, 141, 1.0);
            }

        </style>
    </head>
    <body class="sidebar-mini skin-red">
        <div class="wrapper">
            <?php include("templates/navbar.php");?>
            <?php include("templates/sidebar.php");?>

            <div class="content-wrapper">
                <section class="content-header">
                    <h1>Orders History</h1>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="row" id="orders">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="well well-sm">
                                <h5><strong>Show orders</strong></h5>
                                <div class="selection">
                                    <a data-value="now" class="active">Today</a>
                                    <a data-value="lweek">Last week</a>
                                    <a data-value="lmonth">Last month</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <script>

            function insertOrder(order) {
                var $columnTemplate = $("<div>", {"class": "col-xs-12"});
                var $boxTemplate = $("<div>", {"class": "box box-danger collapsed-box"})

                var $boxHeader = $("<div>", {"class": "box-header"})
                .append($("<h3>", {"class": "box-title"})
                    .html("Order #" + order.id).append($("<small>", {"style": "margin-left: 10px"}).html(moment(order.date).format("MMMM D, YYYY"))))
                .append($("<div>", {"class": "box-tools pull-right"})
                    .html($("<button>", {"class": "btn btn-box-tool", "data-widget": "collapse", "type": "button"})
                        .html($("<i>", {"class": "fa fa-plus"}))
                        )
                    );

                var $boxBody = $("<div>", {"class": "box-body no-padding"});
                var $boxFooter = $("<div>", {"class": "box-footer"})
                .append($("<strong>").html("Total"))
                .append($("<span>", {"class": "pull-right"}).html(order.total.toFixed(2)));

                // Table contents

                var $table = $("<table>", {"class": "table table-responsive"});
                var $tableHead = $("<thead>")
                .append($("<tr>")
                    .append($("<th>").html("Qty"))
                    .append($("<th>").html("Recipe name"))
                    .append($("<th>").html("Price"))
                );
                
                var $tableBody = $("<tbody>");

                for (var i = 0; i < order.orders.length; i++) {
                    $tableBody
                    .append($("<tr>")
                        .append($("<td>").html(order.orders[i].qty))
                        .append($("<td>").html(order.orders[i].recipe_name))
                        .append($("<td>").html(order.orders[i].price.toFixed(2)))
                    );
                }

                // end of table contents

                // merging all of the parts of the box class
                $table.append($tableHead).append($tableBody);
                $boxBody.append($table);

                $boxTemplate.append($boxHeader).append($boxBody).append($boxFooter);
                $("#orders").append($columnTemplate.html($boxTemplate));

            }

            function removeOrders() {
                $("#orders *").remove();
            }

            function initializeListeners() {
                $(".selection > a").on("click", function() {
                    $(".selection > a").removeAttr("class");
                    $(this).attr("class", "active");
                    removeOrders();
                    processDate($(this).data("value"));
                });
            }

            function getOrdersFromDate(min, max) {
                $.post("getHistory.php", {"start": min, "end": max}).done(function(data) {
                    for (var i = 0; i < data.history.length; i++) {
                        insertOrder(data[i]);
                    }
                });
            }

            function processDate(date) {
                if (date.toLowerCase() == "now") {
                    var today = moment().format("YYYY-MM-DD");

                    getOrdersFromDate(today, null);
                } else if (date.toLowerCase() == "lmonth") {
                    var min = moment().subtract(1, "month").format("YYYY-MM-01");
                    var max = moment().subtract(1, "month").format("YYYY-MM-" + moment().subtract(1, "month").daysInMonth());

                    getOrdersFromDate(min, max);
                } else if (date.toLowerCase() == "lweek") {
                    var min = moment(moment().subtract(1, "week").format("YYYY-MM-DD")).day("Sunday").format("YYYY-MM-DD");
                    var max = moment(moment().subtract(1, "week").format("YYYY-MM-DD")).day("Saturday").format("YYYY-MM-DD");

                    getOrdersFromDate(min, max);
                } else {
                    console.log("date is null");
                }
            }

            for (var i = 0; i < 9; i++) {
                insertOrder(
                    {
                        "id": i,
                        "date": "2016-11-09",
                        "orders": [
                            {"qty": 1, "recipe_name": "Bacon", "price": 250.00},
                            {"qty": 1, "recipe_name": "Bacon", "price": 250.00},
                            {"qty": 1, "recipe_name": "Bacon", "price": 250.00},
                            {"qty": 1, "recipe_name": "Bacon", "price": 250.00}
                        ],
                        "total": 1000.00
                    }
                );
            }

            initializeListeners();

        </script>
    </body>
</html>