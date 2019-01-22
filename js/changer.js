function creatReq()
			{
				var httpxml ; 
				try{
					if(window.XMLHttpRequest)
						var httpxml = new XMLHttpRequest();
				else
						var httpxml = new ActiveXObject("Microsoft.XMLHTTP");
					if(!httpxml)
						var httpxml = new ActiveXObject("Msxml2.XMLHTTP.3.0");
					if(!httpxml)
						var httpxml = new ActiveXObject("Msxml2.XMLHTTP.6.0");
				}catch(err)
				{
					document.getElementById("divchange").innerHTML = "impossible d'executee la page a cause de XMLHTTP";
				}
				return httpxml ; 
			}
			//function avec POST ;
			/*function getClick()
			{
						httpxml.onreadystatechange = function()
					{	
						if(httpxml.readyState == 4 && httpxml.status == 200)
						document.getElementById("jax").innerHTML = httpxml.responseText;
					};
						httpxml.open("POST","info.php",true);
						httpxml.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						httpxml.send("name=hamza");
			}*/
			function actionLoadingText()
			{
				if(this.readyState == 1)
					document.getElementById('divchange').innerHTML = "Chargement...";
				if(this.readyState == 2)
					document.getElementById('divchange').innerHTML = "Chargement En courant...";
				if(this.readyState == 3)
					document.getElementById('divchange').innerHTML = "Chargement est reussi avec sucsses";
				if(this.readyState == 4 && this.status == 200)
			        document.getElementById('divchange').innerHTML = this.responseText;
			}	
			function getAJAX(page)
			{
				var httpxml;
				var httpxml = creatReq(); 
							httpxml.onreadystatechange = actionLoadingText;
						httpxml.open("GET",page,true);
						httpxml.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						httpxml.send();
			}