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
        #myDashboard2 form input,
        #myDashboard2 form textarea {
            margin: 0.14em 0;
            width: 100%;
        }
        #myDashboard3.sDashboard li {
            width: 100%;
        }
        #myDashboard3 form label {
            display: block;
            padding: 0.14em;
        }
        #myDashboard3 form input,
        #myDashboard3 form textarea {
            margin: 0.14em 0;
            width: 100%;
        }
        #myDashboard3CreateDialog label,
        #myDashboard3UpdateDialog label {
            display: block;
            float: left;
            width: 100%;
            padding-right: 10px;
        }
        #myDashboard3CreateDialog,
        #myDashboard3UpdateDialog,
        #myDashboard3CreateDialog form,
        #myDashboard3UpdateDialog form {
            min-height: 250px !important;
        }
        #myDashboard3CreateDialog input,
        #myDashboard3CreateDialog select,
        #myDashboard3CreateDialog textarea,
        #myDashboard3UpdateDialog input,
        #myDashboard3UpdateDialog select,
        #myDashboard3UpdateDialog textarea {
            float: left;
            width: 100%;
            margin-bottom: 30px;
        }
        #myDashboard3CreateDialog textarea,
        #myDashboard3UpdateDialog textarea {
            height: 80%;
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
            let dashboard2JSON = [];
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
            });

            let $myDashboard2 = $("ul#myDashboard2");
            let $dashboard2 = $myDashboard2.sDashboard({
                dashboardData : dashboard2JSON
            });
            $myDashboard2.off("click");
            $dashboard2.find(".sDashboardWidgetHeader").prepend("<span title=\"Update\" class=\"ui-icon ui-icon-pencil\">");
            $dashboard2.find(".sDashboardWidgetHeader span.ui-icon.ui-icon-circle-plus").live("click", function () {
                let form = "<form method=\"post\" action=\"/api/contents\">" +
                    "<label for=\"title\">Title:</label><input id=\"title\" name=\"title\" type=\"text\" />" +
                    "<label for=\"content\">Content:</label><textarea id=\"content\" name=\"content\"></textarea>" +
                    "<label></label><input type=\"submit\" id=\"submit\" value=\"Submit\" />" +
                    "</form>"
                $myDashboard2.sDashboard("addWidget", {
                    widgetTitle : "Add Content",
                    widgetId : "new",
                    widgetContent : form
                });
                let $newCard = $myDashboard2.find("#new");
                $newCard.find(".ui-icon-circle-plus").remove();
                $newCard.find(".ui-icon-circle-close").bind("click", function (e) {
                    $myDashboard2.sDashboard("removeWidget", "new");
                })

                $newCard.submit(function (e) {
                    e.preventDefault();
                    let form = $(e.target);
                    let url = form.attr('action');
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


            let $createdCards = $dashboard2.find("li:not(#new)");
            $createdCards.find(".sDashboardWidgetHeader span.ui-icon.ui-icon-circle-close").live("click", function () {
                if (confirm("Continue to delete this?")) {
                    let $cardId = $(this).parent().parent().parent().attr("id");
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
            });

            $dashboard2.find(".sDashboardWidgetHeader span.ui-icon.ui-icon-pencil").live("click", function () {
                let $original = $(this).parent().parent();
                let $cardId = $original.parent().attr("id");
                let $originalHtml = $original.html();
                let $originalTitle = $original.find(".sDashboardWidgetHeader").text().trim();
                let $originalContent = $original.find(".sDashboardWidgetContent").text().trim();

                let $clone = $original.clone(true, true);
                $clone.find(".sDashboardWidgetHeader").text("Update Content");
                $clone.find(".sDashboardWidgetHeader").prepend("<span title=\"Back\" class=\"ui-icon ui-icon-arrowreturnthick-1-w\"></span>");
                let form = "<form action=\"/api/contents/" + $cardId + "\">" +
                    "<label for=\"title\">Title:</label><input id=\"title\" name=\"title\" value=\"" + $originalTitle + "\" type=\"text\" />" +
                    "<label for=\"content\">Content:</label><textarea id=\"content\" name=\"content\">" + $originalContent + "</textarea>" +
                    "<label></label><input type=\"submit\" id=\"submit\" value=\"Submit\" />" +
                    "</form>"
                $clone.find(".sDashboardWidgetContent").html(form);
                let $cloneHtml = $clone.html();

                // contains the new elements
                $original.html($cloneHtml);

                $original.find(".sDashboardWidgetHeader .ui-icon-arrowreturnthick-1-w").on("click", function () {
                    // revert to original elements
                    $original.html($originalHtml);
                });

                $original.submit(function (e) {
                    e.preventDefault();
                    let form = $(e.target);
                    let url = form.attr('action');
                    $.ajax({
                        type: "PUT",
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

            let dashboard3JSON = dashboard2JSON;
            let $myDashboard3 = $("ul#myDashboard3");
            let $dashboard3 = $myDashboard3.sDashboard({
                dashboardData: [{
                    widgetTitle: "Custom Table Widget",
                    widgetId: "custom_table",
                    widgetType: "table",
                    widgetContent: {
                        "bProcessing": true,
                        "bPaginate": false,
                        "bLengthChange": false,
                        "bFilter": true,
                        "bSort": false,
                        "bInfo": false,
                        "bAutoWidth": false,
                        "aaData": dashboard3JSON,
                        "aoColumns": [{
                            "mData": "widgetId"
                        }, {
                            "mData": "widgetTitle"
                        }, {
                            "mData": "widgetContent"
                        }, {
                            "mData": null,
                            "bSortable": false,
                            "mRender": function () { return "<span title=\"Update\" id=\"edit\" class=\"ui-icon ui-icon-pencil\">Update</span>"; }
                        },{
                            "mData": null,
                            "bSortable": false,
                            "mRender": function () { return "<span title=\"Delete\" id=\"delete\" class=\"ui-icon ui-icon-circle-close\">Delete</span>"; }
                        }],
                    }
                }]
            });
            $myDashboard3.off("click");
            $dashboard3.find(".sDashboardWidgetHeader span.ui-icon.ui-icon-circle-close").remove()
            $dashboard3.find(".sDashboardWidgetHeader span.ui-icon.ui-icon-circle-plus").live("click", function () {
                let form = "<form method=\"post\" action=\"/api/contents\">" +
                    "<label for=\"title\">Title:</label><input id=\"title\" name=\"title\" type=\"text\" />" +
                    "<label for=\"content\">Content:</label><textarea rows=\"5\" id=\"content\" name=\"content\"></textarea>" +
                    "</form>"

                $(form).dialog({
                    modal: true,
                    position: {
                        my: "center top",
                        at: "center top",
                        of: window,
                        collision: "none"
                    },
                    buttons: {
                        'Submit': function (e) {
                            let form = $(this).parent().find("form");
                            let url = form.attr('action');
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
                        }
                    }
                }).parent().attr("id", "myDashboard3CreateDialog");
            });
            $dashboard3.find("span.ui-icon.ui-icon-pencil").live("click", function () {
                let $parent = $(this).parent().parent();
                let $id = $parent.find("td:first-child").text();
                let $title = $parent.find("td:nth-child(2)").text();
                let $content = $parent.find("td:nth-child(3)").text();
                let form = "<form action=\"/api/contents/" + $id + "\">" +
                    "<label for=\"title\">Title:</label><input id=\"title\" name=\"title\" type=\"text\" value=\"" + $title + "\"/>" +
                    "<label for=\"content\">Content:</label><textarea id=\"content\" name=\"content\">" + $content + "</textarea>" +
                    "</form>"

                $(form).dialog({
                    modal: true,
                    position: {
                        my: "center top",
                        at: "center top",
                        of: window,
                        collision: "none"
                    },
                    buttons: {
                        'Submit': function (e) {
                            let form = $(this).parent().find("form");
                            let url = form.attr('action');
                            $.ajax({
                                type: "PUT",
                                url: url,
                                data: form.serialize(),
                                success: function() {
                                    location.reload()
                                },
                                error: function (data) {
                                    console.error(data);
                                },
                            });
                        }
                    }
                }).parent().attr("id", "myDashboard3UpdateDialog");
            });
            $dashboard3.find("span.ui-icon.ui-icon-circle-close").live("click", function () {
                let $parent = $(this).parent().parent();
                let $id = $parent.find("td:first-child").text();
                let $title = $parent.find("td:nth-child(2)").text();
                $("<p>Are you sure, you want to delete \"" + $title + "\"?</p>").dialog({
                    modal: true,
                    position: {
                        my: "center top",
                        at: "center top",
                        of: window,
                        collision: "none"
                    },
                    buttons: {
                        'Yes': function () {
                            $.ajax({
                                type: "DELETE",
                                url: "/api/contents/" + $id,
                                success: function() {
                                    location.reload()
                                },
                                error: function (data) {
                                    console.error(data);
                                },
                            });
                        },
                        'No': function () {
                            $(this).dialog("close");
                        }
                    }
                });
            });
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

<hr/>
<h1>This is the customized dashboard</h1>
<ul id="myDashboard2">
</ul>
<h1>This is the customized table widget</h1>
<ul id="myDashboard3">
</ul>
</body>
</html>
