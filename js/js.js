function search(){
	   
	        if (window.XMLHttpRequest) {
	            // code for IE7+, Firefox, Chrome, Opera, Safari
	            xmlhttp = new XMLHttpRequest();
	        } else {
	            // code for IE6, IE5
	            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	        }
	        xmlhttp.onreadystatechange = function() {
	            if (this.readyState == 4 && this.status == 200) {
	                document.getElementByName("rechnung").innerHTML = this.responseText;
	            }
	        };
			//str=document.getElementByName("Abfahrtsort").value();
			//str1=document.getElementByName("Zielsort").value();

			
	        xmlhttp.open("GET","../php/showBestellung.php?abOrt="+str+ "&"+str1,true);
	        xmlhttp.send();
	    };
