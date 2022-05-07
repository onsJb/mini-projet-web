function liste_classe(){
    var xmlhttp = new XMLHttpRequest();
        var url = "affichGroupe.php";

    //Envoie de la requete
	xmlhttp.open("GET",url,true);
	xmlhttp.send();


     //Traiter la reponse
     xmlhttp.onreadystatechange=function()
            {  // alert(this.readyState+" "+this.status);
                if(this.readyState==4 && this.status==200){
                    myFunction(this.responseText);
                    //alert(this.responseText);
                    //console.log(this.responseText);
                }
            }


    //Parse la reponse JSON
	function myFunction(response){
		var obj=JSON.parse(response);
        //alert(obj.success);

        if (obj.success==1)
        {
		var arr=obj.classes;
		var i;
		var out='<select id="classe" name="classe"  class="custom-select custom-select-sm custom-select-lg">';
		for ( i = 0; i < arr.length; i++) {
			out+='<option value="'+arr[i].id+'">'+arr[i].id+'</option>';
		}
		out +="</select>";
		document.getElementById("liste").innerHTML=out;
       }
       else document.getElementById("liste").innerHTML="Pas de groupe!";

    }
  }