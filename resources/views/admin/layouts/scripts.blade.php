{{-- Scripts Adicionais --}}



<script>
    function trigger_photo(element,id){
        //element.preventDefault();
        document.querySelector(`#${id}`).click();
    }

    function imageSelected(id){

        document.querySelector(`#${id}`).submit();

    }


    function postModal(content)
    {
        $("#post-text").text(function(){return content});
        $("#post-modal").modal('show');
        //alert(content)
    }


    //-----------Check all checkBoxs--------------
    function checkAll(el)
    {
        var checkbox = document.querySelectorAll('#check');
        var btn_delete = $('.selected');

            if(el.checked){
                checkbox.forEach(element => {
                    element.checked = true;
            });
            //$("#btn-delete").style('display','inline-block')
            btn_delete.fadeIn("slow");;
            }else{
                checkbox.forEach(element => {
                    element.checked = false;
            });
            btn_delete.fadeOut("slow");
            }
    }

    function countCheck(el){

            var checkbox = document.querySelectorAll('#check');
            var btn_delete = $('.selected');
            var count = 0;

            checkbox.forEach(element => {
                (element.checked == true) ? count ++ :''
            });
            count > 1 ? btn_delete.fadeIn("slow"):btn_delete.fadeOut("slow")

    }
   //-------------Users -------------------------------



   //------------------Create User----------------------------

   function user_create(element,link){

       $("#user-submit").text(function(){
           return "";
       });

       $("#user-submit").addClass(
        "spinner-border spinner-border-sm"
       );

        var name = $("#user-name").val();
        var email = $("#user-email").val();
        var phone = $("#user-phone").val();
        var gender = $("#user-gender").val();
       // var photo = $("#user-photo").val();
        var username = $("#user-username").val();
        var password = $("#user-password").val();
        var role = $("#user-role").val();

        var element = $("#user-success");

        var element_error = $("#user-error");

       $.ajax({
           type:'POST',
           url:`${link}`,
           data:{
               _token:'{{ csrf_token() }}',
               name:name,
               email:email,
               phone:phone,
              // photo:photo,
               username:username,
               password:password,
               role:role,
               gender:gender
               },
           statusCode:{
               '422':function(response){ return display_errors_422(element,element_error)},
               '300':function(response){return display_errors_300(response.responseJSON.error,element_error,element)},
           },
           success:function(response){return display_success(element,element_error)}

       }) // end ajax

       function display_errors_422(el_success,el_error){

        $("#user-submit").removeClass(
            "spinner-border spinner-border-sm"
        );

        $("#user-submit").text(function(){
            return "Submit";
        });

        el_success.css("display","none");
        el_error.text(function(){return "Some field are incorrect or empty, please check the field that don't match with our rules ."});
        el_error.css("display","inline-block");




        }//end display errors 422


        function display_success(el,el_error){

            el_error.css("display","none");
            el_error.text(function(){return ""});
            el.css("display","inline-block");


            $("#user-submit")
            .removeClass(
                "spinner-border spinner-border-sm"
            );

            $("#user-submit").text(function(){
                return "Submit";
            });


        }// end succes

        function display_errors_300(error,el_error,el_success){

            $("#user-submit").removeClass(
                "spinner-border spinner-border-sm"
            );

            $("#user-submit").text(function(){
                return "Submit";
            });


            el_success.css("display","none");
            el_error.text(function(){return error});
            el_error.css("display","inline-block");

        }// end display errors 300

    }// end user create

   //-------------------Update User-----------------------------------

   function user_update(element,link){

       $("#user-submit-edit").text(function(){
           return "";
       });

       $("#user-submit-edit").addClass(
        "spinner-border spinner-border-sm"
       );

        var name = $("#user-name-edit").val();
        var email = $("#user-email-edit").val();
        var phone = $("#user-phone-edit").val();
        var gender = $("#user-gender-edit").val();
        //var photo = $("#user-photo-edit").val();
        var username = $("#user-username-edit").val();
        var password = $("#user-password-edit").val();
        var newPassword = $("#user-new-password-edit").val();
        var role = $("#user-role-edit").val();

        //alert success
        var element = $("#user-success-edit");
        //alert error
        var element_error = $("#user-error-edit");
        var message_error = $("#error-message-edit");

       $.ajax({
           type:'PUT',
           url:`${link}`,
           data:{
               _token:'{{ csrf_token() }}',
               name:name,
               email:email,
               phone:phone,
              // photo:photo,
               username:username,
               newPassword:newPassword,
               password:password,
               role:role,
               gender:gender,
               },
           statusCode:{
               '422':function(response){ return display_errors_422(element,element_error)},
               '300':function(response){return display_errors_300(response.responseJSON.error,element_error,element)}
           },
           success:function(response){return display_success(element,element_error)}

       }) // end ajax

       function display_errors_422(el_success,el_error){

        $("#user-submit-edit").removeClass(
            "spinner-border spinner-border-sm"
        );

        $("#user-submit-edit").text(function(){
            return "Submit";
        });

        el_success.css("display","none");
        message_error.text(function(){return "Some field are incorrect or empty, please check the field that don't match with our rules"});
        el_error.css("display","inline-block");




        }//end display errors 422


        function display_success(el,el_error){

            el_error.css("display","none");
            message_error.text(function(){return ""});
            el.css("display","inline-block");


            $("#user-submit-edit")
            .removeClass(
                "spinner-border spinner-border-sm"
            );

            $("#user-submit-edit").text(function(){
                return "Submit";
            });

        }// end succes

        function display_errors_300(error,el_error,el_success){

            $("#user-submit-edit").removeClass(
                "spinner-border spinner-border-sm"
            );

            $("#user-submit-edit").text(function(){
                return "Submit";
            });


            el_success.css("display","none");
            message_error.text(function(){return error});
            el_error.css("display","inline-block");

        }// end display errors 300

    }// end user create



     //----------------User Delete----------------------------------------

   function user_delete(element,value){
    var confirm = window.confirm("Are you sure that want to delete this user");
    if(confirm){

        $(`#btnu_${value}`).removeClass('bi bi-trash-fill');
        $(`#btnu_${value}`).addClass('spinner-border spinner-border-sm');

        $.ajax({
             type:"DELETE",
             url:`http://dev.cms.com/admin/users/${value}`,
             data:{
                 _token:$("input[name=_token]").val(),
                 Value:value

             },
             success:function(response){
                 $("#userd_"+value).remove();
             }
         })

    }else{
        alert("Canceled")
    }

     }

//-------------Delete All Users---------------------------

    $("#btn-delete-users").click(function(e){
        var checkboxs = document.querySelectorAll("#check");
        var values = [];

        checkboxs.forEach(check=>{
            (check.checked) ? values.push(check.value): ''
        });
        var confirm = window.confirm("Are you sure that want to delete all record");

        if(confirm){

            $("#posts_delete_users").removeClass('bi bi-trash-fill');
            $("#posts_delete_users").addClass('spinner-border spinner-border-sm');

            $.ajax({
            type:"DELETE",
            url:"{{ route('deleteSelected') }}",
            data:{
                _token:$("input[name=_token]").val(),
                ids:values
            },
            success:function(response){
                values.forEach(el=>{
                    $("#userd_"+el).remove()
                });

                $("#posts_delete_users").removeClass('spinner-border spinner-border-sm');
                $("#posts_delete_users").addClass('bi bi-trash-fill');
                $("#btn-delete-users").fadeOut("slow");
               // $("#app").load("http://dev.cms.com/admin/users");
            }
        });//end ajax
        }
        else{
            //action
        }





    });

    //--------------------Categories ---------------------------



    function category_create(element,link){
       // element.preventDefault();
       $("#category-submit").text(function(){
           return "";
       });


       $("#category-submit").addClass(
        "spinner-border spinner-border-sm"
       );

       var name = $("#category-name").val();
       var inputName = document.querySelector("#category-name");



       $.ajax({
           type:'POST',
           url:`${link}`,
           data:{
               _token:'{{ csrf_token() }}',
               name:name
           },statusCode:{
               '422':function(response){ return display_errors_422(response.responseJSON.errors.name)},
               '300':function(response){return display_errors_300(response.responseJSON.error,inputName)}
           },
           success:function(response){return display_success(inputName)}

       }) // end ajax

       function display_errors_422(error){

        $("#category-submit").text(function(){
            return "Submit";
        });

        $("#category-submit").removeClass(
            "spinner-border spinner-border-sm"
        );
        $("#category-name").removeClass(
            "is-valid"
        )
        $("#category-name").addClass(
            "is-invalid"
        );
        $(".invalid-feedback").text(function(){return `${error}`});
        $(".invalid-feedback").css("display","inline-block");
        }//end display errors 422


        function display_success(name){

            $(".invalid-feedback").css("display","none");

            name.classList.forEach(el=>{

                if(el=="is-invalid"){
                    $("#category-name").removeClass(
                        "is-invalid"
                    );

                }
            });

            $("#category-submit").text(function(){
                return "Submit";
            });

            $("#category-submit")
            .removeClass(
                "spinner-border spinner-border-sm"
            );

            $("#category-name").addClass(
                'is-valid'
            );
        }// end succes

        function display_errors_300(error,name){

            $("#category-submit").text(function(){
                return "Submit";
            });

            name.classList.forEach(el=>{

                if(el=="is-valid"){
                    $("#category-name").removeClass(
                        "is-valid"
                    );
                }
            });

            $("#category-submit").removeClass(
                "spinner-border spinner-border-sm"
            );
            $("#category-name").removeClass(
                "is-valid"
            )

            $("#category-name").addClass(
                "is-invalid"
            );
            $(".invalid-feedback").text(function(){return `${error}`});
            $(".invalid-feedback").css("display","inline-block");
        }// end display errors 300

    }// end category create

    function category_edit(name,value) {

        $("#Category-edit-modal").modal('show');

        $("#category-edit-id").val(function(){
            return value;
        })
        $("#category-edit-name").val(function(){
            return name;
        });

     }

function category_update(){
    $(`#category-update-submit`).text(function(){
        return "";
    })
    $(`#category-update-submit`).removeClass('bi bi-pen-fill');
    $(`#category-update-submit`).addClass('spinner-border spinner-border-sm');

   let value = $("#category-edit-id").val();
   let name = $("#category-edit-name").val();

    $.ajax({
    type:"PUT",
    url:`http://dev.cms.com/admin/categories/${value}`,
    data:{
        _token:$("input[name=_token]").val(),
        name:name
    },statusCode:{
    '422':function(response){display_errors_422(response.responseJSON.errors.name)},
    '300':function(response){display_errors_300(response.responseJSON.error)}
},

    success:function(response){display_success()}
})


function display_errors_300(error){

    $("#category-update-submit").removeClass(
        "spinner-border spinner-border-sm"
    );

    $("#category-update-submit").text(function(){
        return "Submit";
    });


    $("#category-edit-name").removeClass(
        "is-valid"
    )
    $("#category-edit-name").addClass(
        "is-invalid"
    );
    $("#error").text(function(){return `${error}`});
    $("#error").css("display","inline-block");


    }// end display errors 300


function display_errors_422(error){

    $("#category-update-submit").removeClass(
        "spinner-border spinner-border-sm"
    );

    $("#category-update-submit").text(function(){
        return "Submit";
    });

    $("#category-edit-name").removeClass(
        "is-valid"
    )
    $("#category-edit-name").addClass(
        "is-invalid"
    );
    $("#error").text(function(){return `${error}`});
    $("#error").css("display","inline-block");
}//end display errors 422

function display_success(){

$("#error").css("display","none");

$("#category-edit-name").removeClass(
    "is-invalid"
)

$("#category-update-submit")
.removeClass(
    "spinner-border spinner-border-sm"
);

$("#category-update-submit").text(function(){
    return "Submit";
});


$("#category-edit-name").addClass(
    'is-valid'
);
}// end succes



    }//end update

    function category_delete(element,value){

        var confirm = window.confirm("Are you sure that want to delete this category");
        if(confirm){

            $(`#btnd_${value}`).removeClass('bi bi-trash-fill');
            $(`#btnd_${value}`).addClass('spinner-border spinner-border-sm');

            $.ajax({
             type:"DELETE",
             url:`http://dev.cms.com/admin/categories/${value}`,
             data:{
                 _token:$("input[name=_token]").val(),
                 Value:value

             },
             success:function(response){

                $('#app').load(`http://dev.cms.com/admin/categories`);

             }
         })
        }else{
                //action
        }

     }



    $("#category-delete-all").click(function(e){

        var checkboxs = document.querySelectorAll("#check");
        $("#delete_all_category").removeClass('bi bi-trash-fill');
        $("#delete_all_category").addClass('spinner-border spinner-border-sm');
        var values = [];

        checkboxs.forEach(check=>{
            (check.checked) ? values.push(check.value): ''
        });

        $.ajax({
            type:"DELETE",
            url:"{{ route('deleteCategoriesSelected') }}",
            data:{
                _token:$("input[name=_token]").val(),
                ids:values
            },
            success:function(response){
                values.forEach(el=>{
                    $("#category_"+el).remove()
                })
               // $('#app').load(`${link}`);
               $("#delete_all_category").removeClass('spinner-border spinner-border-sm');
               $("#delete_all_category").addClass('bi bi-trash-fill');
               $("#category-delete-all").fadeOut("slow");
            }
        });//end ajax


    });

    //------------------------Posts----------------------------------

    function post_delete(value){

        var confirm = window.confirm("Are you sure that want to delete this post ?");
        if(confirm){
            $("#postd_"+value).removeClass('bi bi-trash-fill');
            $("#postd_"+value).addClass('spinner-border spinner-border-sm');
            $.ajax({
            type:"DELETE",
            url:`http://dev.cms.com/admin/posts/${value}`,
            data:{
                _token:$("input[name=_token]").val(),
                Value:value

            },
            success:function(response){
                $("#post_"+value).remove();
                $("#postd_"+value).removeClass('spinner-border spinner-border-sm');
                $("#postd_"+value).addClass('bi bi-trash-fill');
            }
        })
        }else{

        }

}

$("#btn_posts_delete").click(function(e){
        $("#posts_delete").removeClass('bi bi-trash-fill');
        $("#posts_delete").addClass('spinner-border spinner-border-sm');
        var checkboxs = document.querySelectorAll("#check");
        var values = [];

        checkboxs.forEach(check=>{
            (check.checked) ? values.push(check.value): ''
        });
        var confirm = window.confirm("Are you sure that want to delete all record ?");

        if(confirm){
            $.ajax({
            type:"DELETE",
            url:"{{ route('deletePosts') }}",
            data:{
                _token:$("input[name=_token]").val(),
                ids:values
            },
            success:function(response){
                values.forEach(el=>{
                    $("#post_"+el).remove()
                })
                $("#posts_delete").removeClass('spinner-border spinner-border-sm');
                $("#posts_delete").addClass('bi bi-trash-fill');
                $("#btn_posts_delete").fadeOut("slow");
            }
        });//end ajax
        }



    });




//-------------------------Comments---------------------------------------------

function comment_delete(value){

var confirm = window.confirm("Are you sure that want to delete this comment ?");
if(confirm){
    $(`#commentd_${value}`).removeClass('bi bi-trash-fill');
    $(`#commentd_${value}`).addClass('spinner-border spinner-border-sm');
    $.ajax({
    type:"DELETE",
    url:`http://dev.cms.com/admin/comments/${value}`,
    data:{
        _token:$("input[name=_token]").val(),
        Value:value

    },
    success:function(response){
        $("#comment_"+value).remove();
        $(`#commentd_${value}`).removeClass('spinner-border spinner-border-sm');
        $(`#commentd_${value}`).addClass('bi bi-trash-fill');
    }
})
}else{

}

}

function comment_edit(status,value){

            var className = $(`#${value}`).hasClass('bi bi-x-square-fill')? 'bi bi-x-square-fill':'bi bi-check-square-fill';
            $(`#${value}`).removeClass(`${className}`);
            $(`#${value}`).addClass('spinner-border spinner-border-sm');
            status = (status == 'approved') ? 'unaproved':'approved';

        $.ajax({
             type:"PUT",
             url:`http://dev.cms.com/admin/comments/${value}`,
             data:{
                 _token:$("input[name=_token]").val(),
                 Value:status

             },
             success:function(response){

                $("#app").load(`http://dev.cms.com/admin/comments`);
                // $(`#${value}`).removeClass('spinner-border spinner-border-sm');
                // $(`#${value}`).addClass(`${className}`);


              }
          })
     }


$("#comments_delete").click(function(e){


        var checkboxs = document.querySelectorAll("#check");
        var values = [];


        checkboxs.forEach(check=>{
            (check.checked) ? values.push(check.value): ''
        });
        var confirm = window.confirm("Are you sure that want to delete all record ?");

        if(confirm){

        $("#delete_all_comments").removeClass('bi bi-trash-fill');
        $("#delete_all_comments").addClass('spinner-border spinner-border-sm');

            $.ajax({
            type:"DELETE",
            url:"{{ route('deleteComments') }}",
            data:{
                _token:$("input[name=_token]").val(),
                ids:values
            },
            success:function(response){
                values.forEach(el=>{
                    $("#comment_"+el).remove()
                })
                $("#delete_all_comments").removeClass('spinner-border spinner-border-sm ');
                $("#delete_all_comments").addClass('bi bi-trash-fill');
                $("#comments_delete").fadeOut("slow");
            }
        });//end ajax
        }



    });

    //---------------------------Create Comment-----------------------------------

function comment_create(value) {

    $("#comment-modal").modal('show');

    $("#post-id").val(function(){
        return value;
    })
}

function comment_put(){

    $(`#comment-submit`).text(function(){
    return "";
    })
    // $(`#comment-submit`).removeClass('bi bi-pen-fill');
    $(`#comment-submit`).addClass('spinner-border spinner-border-sm');

    let post = $("#post-id").val();
    let content = $("#comment-content").val();

        $.ajax({
        type:"POST",
        url:`http://dev.cms.com/admin/comment/create/${post}`,
        data:{
        _token:$("input[name=_token]").val(),
        comment:content
        },statusCode:{
        '422':function(response){
            display_errors_422(response.responseJSON.errors.comment)}
        },

        success:function(response){display_success()}
        })



function display_errors_422(error){

$("#comment-submit").removeClass(
    "spinner-border spinner-border-sm"
);

$("#comment-submit").text(function(){
    return "Submit";
});

$("#comment-content").removeClass(
         "is-valid"
    )
    $("#comment-content").addClass(
        "is-invalid"
    );
        $("#error-comment").text(function(){return `${error}`});
        $("#error-comment").css("display","inline-block");
}//end display errors 422

function display_success(){

$("#error-comment").css("display","none");

$("#comment-content").removeClass(
    "is-invalid"
)

$("#comment-submit").removeClass(
    "spinner-border spinner-border-sm"
);

$("#comment-submit").text(function(){
    return "Submit";
});


$("#comment-content").addClass(
    'is-valid'
);
}// end succes



}//end put


//----------------------Comment update--------------------------------------
function comment_edit_content(value,content) {

$("#comment-update-modal").modal('show');

$("#comment-id").val(function(){
    return value;
})

$("#comment-update-content").val(function(){
    return content;
})
}

function comment_update(){

$(`#comment-update-submit`).text(function(){
    return "";
})
// $(`#comment-update-submit`).removeClass('bi bi-pen-fill');
$(`#comment-update-submit`).addClass('spinner-border spinner-border-sm');

let comment = $("#comment-id").val();
let content = $("#comment-update-content").val();

    $.ajax({
    type:"PUT",
    url:`http://dev.cms.com/admin/comment/update/${comment}`,
    data:{
    _token:$("input[name=_token]").val(),
    comment:content
    },statusCode:{
    '422':function(response){
        display_errors_422(response.responseJSON.errors.comment)}
    },

    success:function(response){display_success()}
    })



function display_errors_422(error){

$("#comment-update-submit").removeClass(
"spinner-border spinner-border-sm"
);

$("#comment-update-submit").text(function(){
return "Submit";
});

$("#comment-update-content").removeClass(
     "is-valid"
)
$("#comment-update-content").addClass(
    "is-invalid"
);
    $("#error-comment-update").text(function(){return `${error}`});
    $("#error-comment-update").css("display","inline-block");
}//end display errors 422

function display_success(){

$("#error-comment-update").css("display","none");

$("#comment-update-content").removeClass(
"is-invalid"
)

$("#comment-update-submit").removeClass(
"spinner-border spinner-border-sm"
);

$("#comment-update-submit").text(function(){
return "Submit";
});


$("#comment-update-content").addClass(
'is-valid'
);
}// end succes



}//end put

    //-------------------Paginate---------------------------

    function paginate(element,link){

        var id = element.id;

        $(`#${id}`).removeClass('bi bi-chevron-right');
        $(`#${id}`).removeClass('bi bi-chevron-left');
        $(`#${id}`).addClass('spinner-border spinner-border-sm disabled');


        $.ajax({
            type:'get',
            url:`${link}`,
            data:{
                _token:$("input[name=_token]").val()
            },
            success:function(response){
                $("#app").load(`${link}`);
            }
        })
    }


//--------------------------Send-Message--------------------------------------

            function sendMessage(transmitter,receptor)
            {
                let message = $("#message").val();
                $("#up").removeClass('bi bi-arrow-up');
                $("#up").addClass('spinner-border spinner-border-sm');

                $.ajax({
                    type:'POST',
                    url:'{{ route('sendMessage') }}',
                    data:{
                        _token:'{{ csrf_token() }}',
                        message:message,
                        transmitter:transmitter,
                        receptor:receptor
                    },
                    success:function(response){
                    $("#app")
                    .load(`http://dev.cms.com/admin/talk-with/${receptor}`);
                    }
                })
            }

</script>
@include('admin.layouts.bootstrap')
