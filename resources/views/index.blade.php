<html>
<head>

    <!-- load jquery ui css theme -->
    <link type="text/css" href="css/jquery-ui.css" rel="stylesheet" />

    <!-- load the dashboard css -->
    <link href="/css/sDashboard.css" rel="stylesheet">

    <link href="/css/jquery.minitwitter.css" rel="stylesheet">
    <!-- load gitter css -->
    <link href="/css/gitter/css/jquery.gritter.css" rel="stylesheet"/>
    <style>
        #myDashboard2 form label {
            display: block;
            padding: 0.14em;
        }
        #myDashboard2 form input, #myDashboard2 form textarea {
            margin: 0.14em 0;
            width: 100%;
        }
    </style>
    <!-- load jquery library -->
    <script src="/libs/jquery/jquery-1.8.2.js" type="text/javascript"> </script>
    <!-- load jquery ui library -->
    <script src="/libs/jquery/jquery-ui.js" type="text/javascript"> </script>

    <!-- load touch punch library to enable dragging on touch based devices -->
    <script src="/libs/touchpunch/jquery.ui.touch-punch.js" type="text/javascript"> </script>
    <!-- load gitter notification library -->
    <script src="/libs/gitter/jquery.gritter.js" type="text/javascript"> </script>

    <!-- load datatables library -->
    <script src="/libs/datatables/jquery.dataTables.js"> </script>

    <!-- load flotr2 charting library -->
    <!--[if IE]>
    <script language="javascript" type="text/javascript" src="/libs/flotr2/flotr2.ie.min.js"></script>
    <![endif]-->
    <script src="/libs/flotr2/flotr2.js" type="text/javascript"> </script>

    <!-- load dashboard library -->
    <script src="/libs/jquery-sDashboard.js" type="text/javascript"> </script>

    <!-- theme switcher -->
    <script src="/libs/themeswitcher/jquery.themeswitcher.min.js" type="text/javascript"> </script>

    <!-- mini twitter library -->
    <script src="/libs/miniTwitter/jquery.minitwitter.js" type="text/javascript"> </script>

    <!-- sample data external script file -->
    <script src="/libs/exampleData.js" type="text/javascript"> </script>
    <!-- example code -->
    <script type="text/javascript">
        $(function() {
            //create a mini twitter div which is external
            $("#myTweets").miniTwitter('ladygaga');

            //Theme switcher plugin
            $("#switcher").themeswitcher({
                imgpath : "css/images/",
                loadTheme : "cupertino"
            });

            //**********************************************//
            //dashboard json data
            //this is the data format that the dashboard framework expects
            //**********************************************//

            var dashboardJSON = [{
                widgetTitle : "Bubble Chart Widget",
                widgetId : "id009",
                widgetType : "chart",
                widgetContent : {
                    data : myExampleData.bubbleChartData,
                    options : myExampleData.bubbleChartOptions
                }

            }, {
                widgetTitle : "Table Widget",
                widgetId : "id3",
                widgetType : "table",
                widgetContent : myExampleData.tableWidgetData
            }, {
                widgetTitle : "Text Widget",
                widgetId : "id2",
                widgetContent : "Lorem ipsum dolor sit amet,consectetur adipiscing elit. Aenean lacinia mollis condimentum. Proin vitae ligula quis ipsum elementum tristique. Vestibulum ut sem erat."
            }, {
                widgetTitle : "Pie Chart Widget",
                widgetId : "id001",
                widgetType : "chart",
                widgetContent : {
                    data : myExampleData.pieChartData,
                    options : myExampleData.pieChartOptions
                }

            }, {
                widgetTitle : "bar Chart Widget",
                widgetId : "id002",
                widgetType : "chart",
                widgetContent : {
                    data : myExampleData.barChartData,
                    options : myExampleData.barChartOptions
                }

            }, {
                widgetTitle : "line Chart Widget",
                widgetId : "id003",
                widgetType : "chart",
                getDataBySelection : true,
                widgetContent : {
                    data : myExampleData.lineChartData,
                    options : myExampleData.lineChartOptions
                }

            }, {
                widgetTitle : "Lady gaga tweets",
                widgetId : "tweet123",
                widgetContent : $("#myTweets")
            }];

            //basic initialization example
            $("#myDashboard").sDashboard({
                dashboardData : dashboardJSON
            });

            //table row clicked event example
            $("#myDashboard").bind("sdashboardrowclicked", function(e, data) {
                $.gritter.add({
                    position: 'bottom-left',
                    title : 'Table row clicked',
                    time : 1000,
                    text : 'A table row within a table widget has been clicked, please check the console for additional event data'
                });

                if (console) {
                    console.log("table row clicked, for widget: " + data.selectedWidgetId);
                }
            });

            //plot selected event example
            $("#myDashboard").bind("sdashboardplotselected", function(e, data) {
                $.gritter.add({
                    position: 'bottom-left',
                    title : 'Plot selected',
                    time : 1000,
                    text : 'A plot has been selected within a chart widget, please check the console for additional event data'
                });
                if (console) {
                    console.log("chart range selected, for widget: " + data.selectedWidgetId);
                }
            });
            //plot click event example
            $("#myDashboard").bind("sdashboardplotclicked", function(e, data) {
                $.gritter.add({
                    position: 'bottom-left',
                    title : 'Plot Clicked',
                    time : 1000,
                    text : 'A plot has been clicked within a chart widget, please check the console for additional event data'
                });
                if (console) {
                    console.log("chart clicked, for widget: " + data.selectedWidgetId);
                }
            });

            //widget order changes event example
            $("#myDashboard").bind("sdashboardorderchanged", function(e, data) {
                $.gritter.add({
                    position: 'bottom-left',
                    title : 'Order Changed',
                    time : 4000,
                    text : 'The widgets order has been changed,check the console for the sorted widget definitions array'
                });
                if (console) {
                    console.log("Sorted Array");
                    console.log("+++++++++++++++++++++++++");
                    console.log(data.sortedDefinitions);
                    console.log("+++++++++++++++++++++++++");
                }

            });
            //example for adding a text widget
            $("#btnAddWidget").click(function() {
                $("#myDashboard").sDashboard("addWidget", {
                    widgetTitle : "Widget 7",
                    widgetId : "id008",
                    widgetContent : "Lorem ipsum dolor sit amet," + "consectetur adipiscing elit." + "Aenean lacinia mollis condimentum." + "Proin vitae ligula quis ipsum elementum tristique." + "Vestibulum ut sem erat."
                });
            });

            //example for adding a table widget
            $("#btnAddTableWidget").click(function() {
                $("#myDashboard").sDashboard("addWidget", {
                    widgetTitle : "Table Widget 2",
                    widgetId : "id007",
                    widgetType : "table",
                    widgetContent : myExampleData.tableWidgetData
                });

            });

            //example for  deleting a widget
            $("#btnDeleteWidget").click(function() {
                $("#myDashboard").sDashboard("removeWidget", "id007");
            });

            //example for adding a pie chart widget
            $("#btnAddPieChartWidget").click(function() {

                $("#myDashboard").sDashboard("addWidget", {
                    widgetTitle : "Pie Chart 2",
                    widgetId : "id006",
                    widgetType : "chart",
                    widgetContent : {
                        data : myExampleData.pieChartData,
                        options : myExampleData.pieChartOptions
                    }
                });

            });

            //example for adding a bar chart widget
            $("#btnAddBarChartWidget").click(function() {

                $("#myDashboard").sDashboard("addWidget", {
                    widgetTitle : "Bar Chart 2",
                    widgetId : "id005",
                    widgetType : "chart",
                    widgetContent : {
                        data : myExampleData.barChartData,
                        options : myExampleData.barChartOptions
                    }
                });
            });

            //example for adding an line chart widget
            $("#btnAddLineChartWidget").click(function() {
                $("#myDashboard").sDashboard("addWidget", {
                    widgetTitle : "Line Chart 2",
                    widgetId : "id004",
                    widgetType : "chart",
                    getDataBySelection : true,
                    widgetContent : {
                        data : myExampleData.lineChartData,
                        options : myExampleData.lineChartOptions
                    }

                });
            });

            /** Custom dashboard **/
            var dashboard2JSON = [];
            $.ajax({
                url: '/api/contents',
                contentType: "application/json",
                dataType: 'json',
                async: false,
                success: function(results){
                    for (var index in results) {
                        dashboard2JSON.push({
                            widgetTitle : results[index].title,
                            widgetId : results[index].id.toString(),
                            widgetContent: results[index].content
                        })
                    }
                }
            })

            var $myDashboard2 = $("ul#myDashboard2");
            var $dashboard2 = $myDashboard2.sDashboard({
                dashboardData : dashboard2JSON
            });
            $("ul#myDashboard2.sDashboard.ui-sortable").off("click");
            $dashboard2.find(".sDashboardWidgetHeader span.ui-icon.ui-icon-circle-plus").on("click", function () {
                var form = "<form method=\"post\" action=\"/api/contents\">" +
                    "<label for=\"title\">Title:</label><input id=\"title\" name=\"title\" type=\"text\" />" +
                    "<label for=\"content\">Content:</label><textarea id=\"content\" name=\"content\" type=\"text\" />" +
                    "<label></label><input type=\"submit\" id=\"submit\" value=\"Submit\" />" +
                    "</form>"
                $myDashboard2.sDashboard("addWidget", {
                    widgetTitle : "Add Content",
                    widgetId : "new",
                    widgetContent : form
                });
                var $newCard = $myDashboard2.find("#new");
                $newCard.find(".ui-icon-circle-plus").remove();
                $newCard.find(".ui-icon-circle-close").bind("click", function (e) {
                    $myDashboard2.sDashboard("removeWidget", "new");
                })

                $newCard.submit(function (e) {
                    e.preventDefault();
                    var form = $(e.target);
                    var url = form.attr('action');
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: form.serialize(),
                        success: function() {
                            location.reload()
                        },
                        error: function (data) {
                            console.error(data);
                        },
                    });
                });
            });
            var $createdCards = $dashboard2.find("li").not("#new");
            $createdCards.find(".sDashboardWidgetHeader span.ui-icon.ui-icon-circle-close").on("click", function () {
                if (confirm("Continue to delete this?")) {
                    var $cardId = $(this).parent().parent().parent().attr("id");
                    $.ajax({
                        type: "DELETE",
                        url: "/api/contents/" + $cardId,
                        success: function() {
                            location.reload()
                        },
                        error: function (data) {
                            console.error(data);
                        },
                    });
                }
                return false;
            })
        });
    </script>
</head>

<body>
<label>Features :</label>
<button id="btnAddWidget">
    1) Add Widget
</button>
<button id="btnAddTableWidget">
    2) Add Table widget
</button>
<button id="btnDeleteWidget">
    3) Delete Table Widget
</button>
<button id="btnAddPieChartWidget">
    4) Add Pie Chart widget
</button>
<button id="btnAddBarChartWidget">
    5) Add Bar Chart widget
</button>
<button id="btnAddLineChartWidget">
    6) Add Line Chart widget
</button>
<button id="btnDeleteWidget">
    6) Add Line Chart widget
</button>

<div id="switcher" style="float:right;"> </div>

<hr/>
<ul id="myDashboard">

</ul>

<div id="myTweets"> </div>

<ul id="myDashboard2">

</ul>

</body>
</html>
