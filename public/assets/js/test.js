let all = document.getElementById("all");
all.addEventListener("click",check)
function check(){
    let ele = document.querySelectorAll(".all");
    if(all.checked==true)
    {
        alert("hi");
    for (let i=0; i<ele.length; i++)
    {
        ele[i].checked=true;
    }
    }
    else {
        for (let i=0; i<ele.length; i++)
        {
            ele[i].checked=false;
        }

    }

}

console.log("hiii");