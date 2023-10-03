"use strict";

window.onload = 
    function()
    {
        let popButton = document.getElementById("popButton");

        if(popButton != null)
        {
            popButton.onclick = showPopular;
        }
    };

function showPopular()
{
    alert("Popular book now is... Data Base Management: 9780805360400");
}
