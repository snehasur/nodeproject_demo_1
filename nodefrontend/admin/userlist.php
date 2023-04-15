<!DOCTYPE html>
<html>
   <head>
      <title>User List</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
      <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <style>
         body{
         background-color: #eee; 
         }
         table th , table td{
         text-align: center;
         }
         table tr:nth-child(even){
         background-color: #BEF2F5
         }
         .pagination li:hover{
         cursor: pointer;
         }
         /* table tbody tr {
         display: none;
         } */
      </style>
   </head>
   <body>
      <div class="container">
         <h2>User List</h2>
         <br>
               <span id="successmsg"></span>
         <br><span id="errormsg"></span><br>
         <div class="form-group">
            <!--		Show Numbers Of Rows 		-->
            <select class  ="form-control" name="state" id="maxRows">
               <option value="5000">Show ALL Rows</option>
               <option value="5">5</option>
               <option value="10">10</option>
               <option value="15">15</option>
               <option value="20">20</option>
               <option value="50">50</option>
               <option value="70">70</option>
               <option value="100">100</option>
            </select>
         </div>
         <table class="table table-striped table-class" id= "table-id">
            <thead>
               <tr>
               <th>Name</th>
               <th>Email</th>
               <th>Phone</th>
               <th>Date</th>
               </tr>
            </thead>
            <tbody id="tbody">
            </tbody>
         </table>
         <!--		Start Pagination -->
         <div class='pagination-container' >
            <nav>
               <ul class="pagination">
                  <li data-page="prev" >
                     <span> < <span class="sr-only">(current)</span></span>
                  </li>
                  <!--	Here the JS Function Will Add the Rows -->
                  <li data-page="next" id="prev">
                     <span> > <span class="sr-only">(current)</span></span>
                  </li>
               </ul>
            </nav>
         </div>
      </div>
      <!-- 		End of Container -->
      <!--  Developed By Yasser Mas -->
      <script>
         getPagination('#table-id');
         //getPagination('.table-class');
         //getPagination('table');
         
         /*					PAGINATION 
         - on change max rows select options fade out all rows gt option value mx = 5
         - append pagination list as per numbers of rows / max rows option (20row/5= 4pages )
         - each pagination li on click -> fade out all tr gt max rows * li num and (5*pagenum 2 = 10 rows)
         - fade out all tr lt max rows * li num - max rows ((5*pagenum 2 = 10) - 5)
         - fade in all tr between (maxRows*PageNum) and (maxRows*pageNum)- MaxRows 
         */
         
         
         function getPagination(table) {
         var lastPage = 1;
         
         $('#maxRows')
         .on('change', function(evt) {
         //$('.paginationprev').html('');						// reset pagination
         
         lastPage = 1;
         $('.pagination')
         .find('li')
         .slice(1, -1)
         .remove();
         var trnum = 0; // reset tr counter
         var maxRows = parseInt($(this).val()); // get Max Rows from select option
         
         if (maxRows == 5000) {
         $('.pagination').hide();
         } else {
         $('.pagination').show();
         }
         
         var totalRows = $(table + ' tbody tr').length; // numbers of rows
         $(table + ' tr:gt(0)').each(function() {
         // each TR in  table and not the header
         trnum++; // Start Counter
         if (trnum > maxRows) {
         // if tr number gt maxRows
         
         $(this).hide(); // fade it out
         }
         if (trnum <= maxRows) {
         $(this).show();
         } // else fade in Important in case if it ..
         }); //  was fade out to fade it in
         if (totalRows > maxRows) {
         // if tr total rows gt max rows option
         var pagenum = Math.ceil(totalRows / maxRows); // ceil total(rows/maxrows) to get ..
         //	numbers of pages
         for (var i = 1; i <= pagenum; ) {
         // for each page append pagination li
         $('.pagination #prev')
         .before(
         '<li data-page="' +
         i +
         '">\
         <span>' +
         i++ +
         '<span class="sr-only">(current)</span></span>\
         </li>'
         )
         .show();
         } // end for i
         } // end if row count > max rows
         $('.pagination [data-page="1"]').addClass('active'); // add active class to the first li
         $('.pagination li').on('click', function(evt) {
         // on click each page
         evt.stopImmediatePropagation();
         evt.preventDefault();
         var pageNum = $(this).attr('data-page'); // get it's number
         
         var maxRows = parseInt($('#maxRows').val()); // get Max Rows from select option
         
         if (pageNum == 'prev') {
         if (lastPage == 1) {
         return;
         }
         pageNum = --lastPage;
         }
         if (pageNum == 'next') {
         if (lastPage == $('.pagination li').length - 2) {
         return;
         }
         pageNum = ++lastPage;
         }
         
         lastPage = pageNum;
         var trIndex = 0; // reset tr counter
         $('.pagination li').removeClass('active'); // remove active class from all li
         $('.pagination [data-page="' + lastPage + '"]').addClass('active'); // add active class to the clicked
         // $(this).addClass('active');					// add active class to the clicked
         limitPagging();
         $(table + ' tr:gt(0)').each(function() {
         // each tr in table not the header
         trIndex++; // tr index counter
         // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
         if (
         trIndex > maxRows * pageNum ||
         trIndex <= maxRows * pageNum - maxRows
         ) {
         $(this).hide();
         } else {
         $(this).show();
         } //else fade in
         }); // end of for each tr in table
         }); // end of on click pagination list
         limitPagging();
         })
         .val(5)
         .change();
         
         // end of on select change
         
         // END OF PAGINATION
         }
         
         function limitPagging(){
         // alert($('.pagination li').length)
         
         if($('.pagination li').length > 7 ){
         if( $('.pagination li.active').attr('data-page') <= 3 ){
         $('.pagination li:gt(5)').hide();
         $('.pagination li:lt(5)').show();
         $('.pagination [data-page="next"]').show();
         }if ($('.pagination li.active').attr('data-page') > 3){
         $('.pagination li:gt(0)').hide();
         $('.pagination [data-page="next"]').show();
         for( let i = ( parseInt($('.pagination li.active').attr('data-page'))  -2 )  ; i <= ( parseInt($('.pagination li.active').attr('data-page'))  + 2 ) ; i++ ){
         $('.pagination [data-page="'+i+'"]').show();
         
         }
         
         }
         }
         }
         
         $(function() {
         // Just to append id number for each row
         $('table tr:eq(0)').prepend('<th> ID </th>');
         
         var id = 0;
         
         $('table tr:gt(0)').each(function() {
         id++;
         $(this).prepend('<td>' + id + '</td>');
         });
         });
         
         //  Developed By Yasser Mas
         // yasser.mas2@gmail.com
         
      </script>    
      <script>
         $(window).on('load', function () {  
           var accessToken ="";
           accessToken=localStorage.getItem("accessToken");
           if(accessToken=="" || accessToken == null){
            window.location.href = "http://localhost/nodefrontend/login.php";
           }else{    
            //productlist
            var accessTokenBearer ="Bearer "+accessToken;
            var settings = {
              "url": "http://localhost:5001/api/users/",
              "method": "GET",
              "timeout": 0,
              "headers": {
                "Authorization": accessTokenBearer
              },
            };
         
            $.ajax(settings).done(function (response) {
               if(response.data!=""){
                  console.log(response.data);
                  $.each(response.data, function(key, val) {
                  var data;
                  data +="<tr><td>"+(key+1)+"</td><td>"+val.username+".</td><td>"+val.email+".</td><td>123456789</td><td>"+val.createdAt+"</td></tr>";
                  $('#tbody').append(data);
                  return data;
                  });
               }else{
                  $("#errormsg").text("Something went wrong please try again after sometime....");
               }
         
                
              });
           }          

          });
          

          
      </script>
   </body>
</html>