function afficherDiv() {
    var action = document.getElementById("action").value;
    var resolutionDiv = document.querySelector('.resolution');
    var aireDiv = document.querySelector('.aire');
    var egaliteDiv = document.querySelector('.egalite');
    var minimumDiv = document.querySelector('.minimum');
    
    var inputs = document.querySelectorAll('input[type="text"], input[type="number"]');
    inputs.forEach(function(input) {
        input.removeAttribute('required');
    });
    
    if (action === "1") {
        resolutionDiv.style.display = "block";
        aireDiv.style.display = "none";
         minimumDiv.style.display = "none";
        egaliteDiv.style.display = "none";
        
        document.querySelector('input[name="c"]').setAttribute('required', 'required');
        document.querySelector('input[name="d"]').setAttribute('required', 'required');
        
    } else if (action === "2") {
        resolutionDiv.style.display = "none";
        aireDiv.style.display = "block";
        egaliteDiv.style.display = "none";
         minimumDiv.style.display = "none";
         
        document.querySelector('input[name="g"]').setAttribute('required', 'required');
        document.querySelector('input[name="h"]').setAttribute('required', 'required');
        document.querySelector('input[name="n"]').setAttribute('required', 'required');
        
    } else if (action === "3") {
        resolutionDiv.style.display = "none";
        aireDiv.style.display = "none";
        minimumDiv.style.display = "none";
        egaliteDiv.style.display = "block";
        
        document.querySelector('input[name="x"]').setAttribute('required', 'required');
    }
    else if (action === "4") {
        resolutionDiv.style.display = "none";
        aireDiv.style.display = "none";
        minimumDiv.style.display = "block";
        egaliteDiv.style.display = "none";
        
        document.querySelector('input[name="min_d"]').setAttribute('required', 'required');
        document.querySelector('input[name="pas"]').setAttribute('required', 'required');
    }
}