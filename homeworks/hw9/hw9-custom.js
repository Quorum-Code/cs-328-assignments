"use strict";

window.onload = 
    function()
    {
        let bestLocButton = document.getElementById("bestLocButton");

        if(bestLocButton != null)
        {
            bestLocButton.onclick = showBestLoc;
        }
    };

function showBestLoc()
{
    alert("Most sightings at South Jetty!");
}
