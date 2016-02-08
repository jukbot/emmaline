  function noticetoast() {
       var $toastContent;
       console.log("First floor is " + countArr[1]);
       var $noContent = $('<span>No new message</span>');
       var $currentContent = $('<span>sdsd</span>');
       var fullFloorArr = [];
       for(var i = 0; i < countArr.length; i++){
           if(countArr[i] == 0) { 
              fullFloorArr.push(i);
              console.log(fullFloorArr);
           }     
        }
        if(fullFloorArr.length == 0) {
           $toastContent = $noContent;  
           Materialize.toast($toastContent, 4000);
        }
        else {
            for(var j = 0; j < fullFloorArr.length; j++){
            Materialize.toast("Floor " + fullFloorArr[j] + " is full." , 4000);
            } 
        }
    }