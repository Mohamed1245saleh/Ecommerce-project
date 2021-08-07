$(document).ready(function (){




    $('#perPage').on("change" , function(){
        var selectedPageOption = $(this).children("option:selected").val();
        // if(location.href.indexOf("?page")){
        //     window.location.search = jQuery.query.set("page", 10);
        //     // var urlParams = new URLSearchParams(window.location.search);
        //     // console.log(urlParams.get("page"));
        //     // console.log(urlParams.append("page" ,"1"));
        //     // location.reload(true);
        // }
        var existingTableData = $("#displayBody").html();
        $.ajaxSetup({
            headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        $.ajax({
            type:'Post',
            url:'http://localhost/sany3ei/public/dashboard/tasks',
            data: "displayedRows="+$(this).children("option:selected").val(),
            success:function(data) {
                $('#displayBody').replaceWith(data);
            }
        });
    });

    $(document).on("click" , ".pagination a" , function(event){
       event.preventDefault();
       var selectedPageOption = $("#perPage").children("option:selected").val()
       var page = $(this).attr("href").split("page=")[1];
       selectedPageNumber = $(this).text();
       fetch_data(page , selectedPageOption);
    });

    function fetch_data(pageNumber , dispalyedRows){
        $.ajaxSetup({
            headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        $.ajax({
            type:'Post',
            url:'http://localhost/sany3ei/public/dashboard/tasks',
            data: "pageSelected="+pageNumber+"&displayedRows="+dispalyedRows,
            success:function(data) {
                $('#displayBody').replaceWith(data);
                selectedPageNumber = pageNumber;
              }
            }).done(function(){
            setActiveLi();
        });



    }
    function setActiveLi(){
        var x = $(".pagination li");
        var y = $(".pagination li[class='page-item active']").text();
        var nextPageFlag = true;
        $.each(x , function(k){
            if(k==0){
                $(x[0]).empty();
                $(x[0]).append('<a class="page-link" href="http://localhost/sany3ei/public/dashboard/tasks?page=1">‹</a>');
            }
            if(k==1){
                $(x[1]).empty();
                $(x[1]).append('<a class="page-link" href="http://localhost/sany3ei/public/dashboard/tasks?page=1">1</a>');

            }


            if(selectedPageNumber == '›' && nextPageFlag){
                if(k == (x.length)-2){
                     $(x[(x.length)-1]).addClass("disabled");
             }
              alert(y);
              var modifiedUrl1 = $(x[k]).children().attr("href").split("=");
              $(x[(x.length)-1]).children('a').attr("href" , modifiedUrl1[0] +"="+ (parseInt(y)+1)) ;
              $(x[0]).children('a').attr("href" , modifiedUrl1[0] +"="+ (parseInt(y)-1)) ;
              $(x[parseInt(y)]).removeClass("active");
              $(x[parseInt(y)+1]).addClass("active");
              nextPageFlag = false;
            }else if(selectedPageNumber == '‹' && nextPageFlag){
                if(
                    k == (x.length)-2){
                    $(x[(x.length)-1]).addClass("disabled");
                }

                var modifiedUrl1 = $(x[k]).children().attr("href").split("=");
                $(x[(x.length)-1]).children('a').attr("href" , modifiedUrl1[0] +"="+ (parseInt(y)+1)) ;
                $(x[0]).children('a').attr("href" , modifiedUrl1[0] +"="+ (parseInt(y)-1)) ;
                $(x[parseInt(y)]).removeClass("active");
                $(x[parseInt(y)-1]).addClass("active");
                nextPageFlag = false;
            }
            else if(k == selectedPageNumber && (k != 0 || k != (x.length)-1 )){
                   if(k != 1){
                       $(x[0]).removeClass("disabled");
                   }if(k == $(x).length-2){
                       $(x[$(x).length-1]).addClass("disabled");
                   }
                   $(x[y]).removeClass("active");
                   $(x[k]).addClass("active");
                   var modifiedUrl = $(x[(x.length)-1]).children().attr("href").split("=");
                   $(x[(x.length)-1]).children('a').attr("href" , modifiedUrl[0] +"="+ (k+1)) ;
                   $(x[0]).children('a').attr("href" , modifiedUrl[0] +"="+ (k-1)) ;
                   if(k==1){
                       $(x[0]).addClass("disabled");
                   }

            }

        });
    };




});

// if(k == $(x.length)-1){
//     alert("Mohamed");
//     if(k == (x.length)-2){
//         $(x[(x.length)-1]).addClass("disabled");
//     }
//     var modifiedUrl1 = $(x[k]).children().attr("href").split("=");
//     $(x[(x.length)-1]).children('a').attr("href" , modifiedUrl1[0] +"="+ (parseInt(modifiedUrl1[1])+1)) ;
//     $(x[0]).children('a').attr("href" , modifiedUrl1[0] +"="+ (parseInt(modifiedUrl1[1])-1)) ;
//     $(x[parseInt(modifiedUrl1[1])+1]).addClass("active");
// }
// if( k == selectedPageNumber && k == 0){
//     var modifiedUrl2 = $(x[(x.length)-1]).children().attr("href").split("=");
//     $(x[(x.length)-1]).children('a').attr("href" , modifiedUrl2[0] +"="+ (k+1)) ;
//     $(x[0]).children('a').attr("href" , modifiedUrl2[0] +"="+ (k-1)) ;
//     $(x[k-1]).addClass("active");
// }
