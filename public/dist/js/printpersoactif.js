$('#pri').click(function(){
    var printme = document.getElementById('toble');
    var wme = window.open("","","border = 5px solid black, width=900px ,height=900px");
    wme.document.write(printme.outerHTML);
    wme.document.close();
    wme.focus();
    wme.print();
    wme.close();
})