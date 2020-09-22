    function PrintDiv() {    
       var divToPrint = document.getElementById('printarea');
       var popupWin = window.open('', '_blank', 'width=1000,height=1000');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
