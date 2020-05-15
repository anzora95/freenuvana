function modalhelp(){
    Swal.fire({
        text: 'Please check your order number and try again later!',
        footer: '<a class="clickable" href="mailto:contact@nuvananutrition.com" >Order number not working?</a>',
    });
}


function firstForm(){
    var fname = document.getElementById("fullname").value;
    var email = document.getElementById("email").value;
    var select = document.getElementById("product").value;
    var ordernumber = document.getElementById("ordernumber").value;
    if(fname ==""){
        Swal.fire('Complete your full name');
        return false;
    }
    if(email ==""){
        Swal.fire('Complete your email');
        console.log("Email vacio");
        return false;
    }
    if(select =="select"){
        console.log("select vacio");
        Swal.fire('Choose a Nuvana product');
        return false;
    }
    if(ordernumber =="" ){
        /* Swal.fire(ordernumber.value.length); */
        Swal.fire('Complete your order number');
        return false;
    }

}
function myFunction2() {
    var copyText = document.getElementById("myInput");
    document.getElementById('btncopied').innerText = 'Copied!';
    copyText.select();
    document.execCommand("copy");
    Swal.fire({
            text:" "+ copyText.value,
            title: " ",
        });
    document.getElementById('amazon').removeAttribute('disabled');
        $('#amazon').addClass('button3');
        return false;
    }

    function timeFunction() {
      setTimeout(function myFunction3(){
        document.getElementById('nextBtn').removeAttribute('disabled');

        document.getElementById("nextBtn").className = "mtbtn";
        $('#nextBtn').addClass('mtbtn');
      }, 5000);
   }

   function hidde_step(){
       var span =  document.getElementById("copy-span");
       var tab =  document.getElementById("copy-tab");
       tab.style.display = "none";
       span.style.display = "none";
   }

   function show_steps(){
    var span =  document.getElementById("copy-span");
     span.style.display = "inline-block";
}