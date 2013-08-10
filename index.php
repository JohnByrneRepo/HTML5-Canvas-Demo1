<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>HTML5 Colour Cycle Test</title>
        <script type="text/javascript">
            window.addEventListener("load", eventWindowLoaded, false);	

            function eventWindowLoaded() {
                canvasApp();
            }

            function canvasApp() {

                    var message = "HTML5 Canvas Demo";

                    var theCanvas = document.getElementById("canvasOne");
                    var context = theCanvas.getContext("2d"); 

                    function drawScreen() {

                            //Background
                            context.fillStyle = "#000000";
                            context.fillRect(0, 0, theCanvas.width, theCanvas.height);

                            //Text
                            context.font =  "60px arial" 
                            context.textAlign = "center";
                            context.textBaseline = "middle";

                            var metrics = context.measureText(message);
                            var textWidth = metrics.width;
                            var xPosition = (theCanvas.width/2);
                            var yPosition = (theCanvas.height/2);

                            var gradient = context.createLinearGradient(theCanvas.width / 2,
                                                                        0,
                                                                        theCanvas.width / 2, 
                                                                        theCanvas.height);

                            for (var i=0; i < colorStops.length; i++) {
                                    var tempColorStop = colorStops[i];
                                    var tempColor = tempColorStop.color;
                                    var tempStopPercent = tempColorStop.stopPercent;
                                    gradient.addColorStop(tempStopPercent, tempColor);
                                    tempStopPercent += .015;
                                    if (tempStopPercent > 1) {
                                            tempStopPercent = 0;
                                    }
                                    tempColorStop.stopPercent = tempStopPercent;;
                                    colorStops[i] = tempColorStop;
                            }

                            context.fillStyle = gradient;
                            context.fillText(message, xPosition, yPosition);	
                    }

                    function gameLoop() {
                            window.setTimeout(gameLoop, 20);
                            drawScreen();	
                    }

                    var colorStops = new Array(
                    {color:"#0000FF", stopPercent:0},
                    {color:"#0000CC", stopPercent:.125},
                    {color:"#FF0000", stopPercent:.375},
                    {color:"#004444", stopPercent:.625},
                    {color:"#002288", stopPercent:.875},
                    {color:"#0000CC", stopPercent:1});
                    gameLoop();	
            }
        </script> 
    </head>
    <body>
        <canvas id="canvasOne" width="1024" height="768">
         Your browser does not support HTML 5 Canvas. 
        </canvas>
    </body>
</html>