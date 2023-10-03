// Evan Putnam, Sean Ross, David Judy
// 4/20/2023

"use strict";

function change_textfield()
{
   let valueField1 = document.getElementById("value1");
   valueField1.value = "MUCKED";
}

function allFilled()
{

   let valueField1 = document.getElementById("value1");
   let valueField2 = document.getElementById("value2");
   let valueField3 = document.getElementById("value3");

   let field1Text = valueField1.value;   
   let field2Num = valueField2.value;   
   let field3Text = valueField3.value;   

   if(field2Num > 20 || field2Num < 10)
   {
      alert("Error: invalid integer");
      return false;      
   }
   else if(field1Text != "chocolate" && field1Text != "vanilla")
   {
      alert("Error: invalid flavor");
      return false;      
   }
   else if(field3Text == null)
   {
      alert("Error: field 3 must have text");
      return false;   
   }
   else 
   {
      return true;
   }
}
