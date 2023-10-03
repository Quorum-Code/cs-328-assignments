"use strict";

window.onload = 
    function()
    {
        let sumButton = document.getElementById("sumButton");

        if(sumButton != null)
        {
            sumButton.onclick = sumValues;
        }
    };

function sumValues()
{
    let inputA = document.getElementById("num_a");
    let inputB = document.getElementById("num_b");

    let num_a = inputA.value;
    let num_b = inputB.value;

    let num_result = Number(num_a) + Number(num_b);

    let result = document.getElementById("result");
    result.innerHTML = num_result;
}
