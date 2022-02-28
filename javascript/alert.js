function check()
{
    var a=document.getElementsByName("check[]");
    var j=0;
        for (i=0, l=a.length; i<l; i++)
        {
            if (a[i].checked==true)
            {
                 j++;
            }
        }
       if (j==0)
       {
          document.getElementById('error-elem').innerHTML = " Seleziona almeno un elemento *";
          return false;
       }
       return true;
}