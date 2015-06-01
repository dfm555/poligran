/**
 * Created by root on 23/03/15.
 */
$(document).ready(function(){
 /*Modals forms*/
 $('#addAdmin').on('click',function(){
  var form = '<div class = "msj">\
        </div>\
        <form action=""  method="post"  name="form1" id="form1" data-parsley-validate><div class="">\
            <div class="row">\
        <div class="col-md-4">\
        <div class="form-group">\
        <label class="control-label" for="identification">\
        No. Identificación</label>\
        <input type="text" name="identification" class="form-control" placeholder="" id="identification" data-parsley-type="integer" required/>\
        </div>\
        </div>\
        <div class="col-md-8">\
        <div class="form-group">\
        <label class="control-label" for="fullname">\
        Nombre Completo</label>\
        <input type="text" class="form-control" name="fullname" placeholder="" id="fullname" required>\
        </div>\
        </div>\
        </div>\
       <div class="row">\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="datebirth">\
        Fecha de nacimiento</label>\
        <input type="date" name="datebirth" class="form-control" placeholder="" id="datebirth" required/>\
        </div>\
        </div>\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="email">\
        Correo electrónico</label>\
        <input type="text" name="email" class="form-control" placeholder="" id="email" data-parsley-type="email" required>\
        </div>\
        </div>\
        </div>\
        <div class="row">\
        <div class="col-md-12">\
        <div class="form-group">\
        <label class="control-label" for="username">\
        Nombre de usuario</label>\
        <input type="text" name="username" class="form-control" placeholder="" id="username" required/>\
        </div>\
        </div>\
        </div>\
        <div class="row">\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="firstpassword">\
        Contraseña</label>\
        <input type="password" name="firstpassword" class="form-control" placeholder="" id="firstpassword" required/>\
        </div>\
        </div>\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="password">\
        Repita la contraseña</label>\
        <input type="password" name="password" class="form-control" placeholder="" id="password" data-parsley-equalto="#firstpassword" required>\
        </div>\
        </div>\
        </div>\
            </form>';
  BootstrapDialog.show({
   onshown:function(){
    $('#form1').parsley();
   },onhidden:function(){
    location.reload();
   },
   message: form,
   type: BootstrapDialog.TYPE_DEFAULT,
   cssClass: 'md-row-dialog',
   closable: true,
   closeByBackdrop: false,
   closeByKeyboard: false,
   title: 'Datos Administrador',
   buttons: [{
    label: 'Guardar',
    cssClass: 'btn-default',
    action: function(dialog) {
     $('#form1').parsley().validate();
     if( $('#form1').parsley().isValid()){
      $.ajax({
       type: 'POST',
       url: '/admin/insert',
       data: {
        'identification': $('#identification').val(),
        'fullname': $('#fullname').val(),
        'datebirth': $('#datebirth').val(),
        'email': $('#email').val(),
        'username': $('#username').val(),
        'password': $('#password').val()
       },
       dataType: 'json',
       success: function( result ){
        if(result == 'success'){
         $('.msj').html('<div class="alert alert-success alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Muy bien!</strong> El administrador se creo con éxito.\
									</div>');
        }else{
         $('.msj').html('<div class="alert alert-danger alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Oops!</strong> EL administrador ya existe o hay valores repetidos con otro administrador.\
									</div>');
        }
       }
      });
     }

    }
   }]
  });

 });
 $('.editAdmin').on('click',function(){
  var data = $(this).data('id');
  var form = '<div class = "msj">\
        </div>\
        <form action=""  method="post"  name="form1" id="form1" data-parsley-validate><div class="">\
            <div class="row">\
        <div class="col-md-4">\
        <div class="form-group">\
        <label class="control-label" for="identification">\
        No. Identificación</label>\
        <input readonly type="text" name="identification" class="form-control" placeholder="" id="identification" data-parsley-type="integer" required/>\
        </div>\
        </div>\
        <div class="col-md-8">\
        <div class="form-group">\
        <label class="control-label" for="fullname">\
        Nombre Completo</label>\
        <input type="text" class="form-control" name="fullname" placeholder="" id="fullname" required>\
        </div>\
        </div>\
        </div>\
       <div class="row">\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="datebirth">\
        Fecha de nacimiento</label>\
        <input type="date" name="datebirth" class="form-control" placeholder="" id="datebirth" required/>\
        </div>\
        </div>\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="email">\
        Correo electrónico</label>\
        <input type="text" name="email" class="form-control" placeholder="" id="email" data-parsley-type="email" required>\
        </div>\
        </div>\
        </div>\
        <div class="row">\
        <div class="col-md-12">\
        <div class="form-group">\
        <label class="control-label" for="username">\
        Nombre de usuario</label>\
        <input readonly type="text" name="username" class="form-control" placeholder="" id="username" required/>\
        </div>\
        </div>\
        </div>\
        <div class="row">\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="firstpassword">\
        Contraseña</label>\
        <input type="password" name="firstpassword" class="form-control" placeholder="" id="firstpassword"/>\
        </div>\
        </div>\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="password">\
        Repita la contraseña</label>\
        <input type="password" name="password" class="form-control" placeholder="" id="password" data-parsley-equalto="#firstpassword">\
        </div>\
        </div>\
        </div>\
            </form>';
  BootstrapDialog.show({
   onshown:function(){
    $('#form1').parsley();
    $.ajax({
     type: 'POST',
     url: '/admin/findbyid',
     data: {
      'id': data
     },
     dataType: 'json',
     success: function( result ){
      $.each(result, function(i,val){
       $('#identification').val(val.identification);
       $('#fullname').val(val.full_name);
       $('#datebirth').val(val.date_of_birth);
       $('#email').val(val.email);
       $('#username').val(val.user_name);
      });
     }
    });
   },
   onhidden:function(){
    location.reload();
   },
   message: form,
   type: BootstrapDialog.TYPE_DEFAULT,
   cssClass: 'md-row-dialog',
   closable: true,
   closeByBackdrop: false,
   closeByKeyboard: false,
   title: 'Datos Administrador',
   buttons: [{
    label: 'Guardar',
    cssClass: 'btn-default',
    action: function(dialog) {
     $('#form1').parsley().validate();
     if( $('#form1').parsley().isValid()){
      $.ajax({
       type: 'POST',
       url: '/admin/update',
       data: {
        'identification': $('#identification').val(),
        'fullname': $('#fullname').val(),
        'datebirth': $('#datebirth').val(),
        'email': $('#email').val(),
        'password': $('#password').val(),
        'id':data
       },
       dataType: 'json',
       success: function( result ){
        if(result == 'success'){
         $('.msj').html('<div class="alert alert-success alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Muy bien!</strong> El administrador se actualizó con éxito.\
									</div>');
        }else{
         $('.msj').html('<div class="alert alert-danger alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Oops!</strong> EL administrador ya existe o hay valores repetidos con otro usuario.\
									</div>');
        }
       }
      });
     }
    }
   }]
  });
 });
 $('.deleteAdmin').on('click',function(){
  var data = $(this).data('id');
  var user = $(this).data('user');
  BootstrapDialog.show({
   message: '<div class="msj"></div><p>Está seguro de eliminar este registro?</p>',
   type: BootstrapDialog.TYPE_DANGER,
   size: BootstrapDialog.SIZE_SMALL,
   cssClass: 'modal',
   closable: true,
   closeByBackdrop: false,
   closeByKeyboard: false,
   title: 'Datos Administrador',
   buttons: [{
    label: 'Si',
    cssClass: 'btn-danger',
    action: function(dialog) {
     $.ajax({
      type: 'POST',
      url: '/admin/delete',
      data: {
       'id':data,
       'user':user
      },
      dataType: 'json',
      success: function( result ){
       if(result == 'success'){
        location.reload();
       }else{
        $('.msj').html('<div class="alert alert-danger alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Oops!</strong> EL administrador tiene dependencias y no se puede eliminar.\
									</div>');
       }
      }
     });
    }
   },{
    label:'No',
    cssClass: 'btn-blue',
    action: function(dialog) {
     dialog.close();
    }
   }]
  });
 });

 $('#addTeacher').on('click',function(){
  var form = '<div class = "msj">\
        </div><form action=""  method="post"  name="form1" id="form1" data-parsley-validate><div class="">\
            <div class="row">\
        <div class="col-md-4">\
        <div class="form-group">\
        <label class="control-label" for="identification">\
        No. Identificación</label>\
        <input type="text" name="identification" class="form-control" placeholder="" id="identification" data-parsley-type="integer" required/>\
        </div>\
        </div>\
        <div class="col-md-8">\
        <div class="form-group">\
        <label class="control-label" for="fullname">\
        Nombre Completo</label>\
        <input type="text" class="form-control" placeholder="" id="fullname" required>\
        </div>\
        </div>\
        </div>\
       <div class="row">\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="datebirth">\
        Fecha de nacimiento</label>\
        <input type="date" name="datebirth" class="form-control" placeholder="" id="datebirth" required/>\
        </div>\
        </div>\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="email">\
        Correo electrónico</label>\
        <input type="text" class="form-control" placeholder="" id="email" data-parsley-type="email" required>\
        </div>\
        </div>\
        </div>\
        <div class="row">\
        <div class="col-md-12">\
        <div class="form-group">\
        <label class="control-label" for="username">\
        Nombre de usuario</label>\
        <input type="text" name="username" class="form-control" placeholder="" id="username" required/>\
        </div>\
        </div>\
        </div>\
        <div class="row">\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="firstpassword">\
        Contraseña</label>\
        <input type="password" name="firstpassword" class="form-control" placeholder="" id="firstpassword" required/>\
        </div>\
        </div>\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="password">\
        Repita la contraseña</label>\
        <input type="password" class="form-control" placeholder="" id="password" data-parsley-equalto="#firstpassword" required>\
        </div>\
        </div>\
        </div>\
        <div class="row">\
        <div class="col-md-3">\
        <div class="form-group">\
        <label class="control-label" for="office">\
        Oficina</label>\
        <input type="text" name="office" class="form-control" placeholder="" id="office" required/>\
        </div>\
        </div>\
        <div class="col-md-3">\
        <div class="form-group">\
        <label class="control-label" for="phone">\
        Teléfono</label>\
        <input type="text" class="form-control" placeholder="" id="phone" required>\
        </div>\
        </div>\
        <div class="col-md-3">\
        <div class="form-group">\
        <label class="control-label" for="category">\
        Categoría</label>\
        <input type="text" name="category" class="form-control" placeholder="" id="category" required/>\
        </div>\
        </div>\
        <div class="col-md-3">\
        <div class="form-group">\
        <label class="control-label" for="amounthour">\
        Valor hora</label>\
        <input type="text" class="form-control" placeholder="" id="amounthour" required>\
        </div>\
        </div>\
        </div>\
            </form>';
  BootstrapDialog.show({
   onshown:function(){
    $('#form1').parsley();
   },onhidden:function(){
    location.reload();
   },
   message: form,
   type: BootstrapDialog.TYPE_DEFAULT,
   cssClass: 'md-row-dialog',
   closable: true,
   closeByBackdrop: false,
   closeByKeyboard: false,
   title: 'Datos Profesor',
   buttons: [{
    label: 'Guardar',
    cssClass: 'btn-default',
    action: function(dialog) {
     $('#form1').parsley().validate();
     if( $('#form1').parsley().isValid()){
      $.ajax({
       type: 'POST',
       url: '/teacher/insert',
       data: {
        'identification': $('#identification').val(),
        'fullname': $('#fullname').val(),
        'datebirth': $('#datebirth').val(),
        'email': $('#email').val(),
        'username': $('#username').val(),
        'password': $('#password').val(),
        'office': $('#office').val(),
        'phone': $('#phone').val(),
        'category': $('#category').val(),
        'amounthour': $('#amounthour').val()
       },
       dataType: 'json',
       success: function( result ){
        if(result == 'success'){
         $('.msj').html('<div class="alert alert-success alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Muy bien!</strong> El profesor se creo con éxito.\
									</div>');
        }else{
         $('.msj').html('<div class="alert alert-danger alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Oops!</strong> EL profesor ya existe o hay valores repetidos con otro profesor.\
									</div>');
        }
       }
      });
     }
    }
   }]
  });
 });
 $('.editTeacher').on('click',function(){
  var data = $(this).data('id');
  var user =  $(this).data('user');
  var form = '<div class = "msj">\
        </div><form action=""  method="post"  name="form1" id="form1" data-parsley-validate><div class="">\
            <div class="row">\
        <div class="col-md-4">\
        <div class="form-group">\
        <label class="control-label" for="identification">\
        No. Identificación</label>\
        <input readonly type="text" name="identification" class="form-control" placeholder="" id="identification" data-parsley-type="integer" required/>\
        </div>\
        </div>\
        <div class="col-md-8">\
        <div class="form-group">\
        <label class="control-label" for="fullname">\
        Nombre Completo</label>\
        <input type="text" class="form-control" placeholder="" id="fullname" required>\
        </div>\
        </div>\
        </div>\
       <div class="row">\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="datebirth">\
        Fecha de nacimiento</label>\
        <input type="date" name="datebirth" class="form-control" placeholder="" id="datebirth" required/>\
        </div>\
        </div>\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="email">\
        Correo electrónico</label>\
        <input type="text" class="form-control" placeholder="" id="email" data-parsley-type="email" required>\
        </div>\
        </div>\
        </div>\
        <div class="row">\
        <div class="col-md-12">\
        <div class="form-group">\
        <label class="control-label" for="username">\
        Nombre de usuario</label>\
        <input readonly type="text" name="username" class="form-control" placeholder="" id="username" required/>\
        </div>\
        </div>\
        </div>\
        <div class="row">\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="firstpassword">\
        Contraseña</label>\
        <input type="password" name="firstpassword" class="form-control" placeholder="" id="firstpassword"/>\
        </div>\
        </div>\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="password">\
        Repita la contraseña</label>\
        <input type="password" class="form-control" placeholder="" id="password" data-parsley-equalto="#firstpassword">\
        </div>\
        </div>\
        </div>\
        <div class="row">\
        <div class="col-md-3">\
        <div class="form-group">\
        <label class="control-label" for="office">\
        Oficina</label>\
        <input type="text" name="office" class="form-control" placeholder="" id="office" required/>\
        </div>\
        </div>\
        <div class="col-md-3">\
        <div class="form-group">\
        <label class="control-label" for="phone">\
        Teléfono</label>\
        <input type="text" class="form-control" placeholder="" id="phone" required>\
        </div>\
        </div>\
        <div class="col-md-3">\
        <div class="form-group">\
        <label class="control-label" for="category">\
        Categoría</label>\
        <input type="text" name="category" class="form-control" placeholder="" id="category" required/>\
        </div>\
        </div>\
        <div class="col-md-3">\
        <div class="form-group">\
        <label class="control-label" for="amounthour">\
        Valor hora</label>\
        <input type="text" class="form-control" placeholder="" id="amounthour" required>\
        </div>\
        </div>\
        </div>\
            </form>';
  BootstrapDialog.show({
   onshown:function(){
    $('#form1').parsley();
    $.ajax({
     type: 'POST',
     url: '/teacher/findbyid',
     data: {
      'id': data
     },
     dataType: 'json',
     success: function( result ){
      $.each(result, function(i,val){
       $('#identification').val(val.identification);
       $('#fullname').val(val.full_name);
       $('#datebirth').val(val.date_of_birth);
       $('#email').val(val.email);
       $('#username').val(val.user_name);
       $('#office').val(val.office);
       $('#phone').val(val.phone_number);
       $('#category').val(val.category);
       $('#amounthour').val(val.amount_hour);
      });
     }
    });
   },onhidden:function(){
    location.reload();
   },
   message: form,
   type: BootstrapDialog.TYPE_DEFAULT,
   cssClass: 'md-row-dialog',
   closable: true,
   closeByBackdrop: false,
   closeByKeyboard: false,
   title: 'Datos Profesor',
   buttons: [{
    label: 'Guardar',
    cssClass: 'btn-default',
    action: function(dialog) {
     $('#form1').parsley().validate();
     if( $('#form1').parsley().isValid()){
      $.ajax({
       type: 'POST',
       url: '/teacher/update',
       data: {
        'identification': $('#identification').val(),
        'fullname': $('#fullname').val(),
        'datebirth': $('#datebirth').val(),
        'email': $('#email').val(),
        'password': $('#password').val(),
        'office': $('#office').val(),
        'phone': $('#phone').val(),
        'category': $('#category').val(),
        'amounthour': $('#amounthour').val(),
        'id':data,
        'user':user
       },
       dataType: 'json',
       success: function( result ){
        if(result == 'success'){
         $('.msj').html('<div class="alert alert-success alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Muy bien!</strong> El profesor se actualizó con éxito.\
									</div>');
        }else{
         $('.msj').html('<div class="alert alert-danger alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Oops!</strong> Hay valores repetidos con otro profesor.\
									</div>');
        }
       }
      });
     }
    }
   }]
  });
 });
 $('.deleteTeacher').on('click',function(){
  var data = $(this).data('id');
  var user = $(this).data('user');
  BootstrapDialog.show({
   message: '<div class="msj"></div><p>Está seguro de eliminar este registro?</p>',
   type: BootstrapDialog.TYPE_DANGER,
   size: BootstrapDialog.SIZE_SMALL,
   cssClass: 'modal',
   closable: true,
   closeByBackdrop: false,
   closeByKeyboard: false,
   title: 'Datos Profesor',
   buttons: [{
    label: 'Si',
    cssClass: 'btn-danger',
    action: function(dialog) {
     $.ajax({
      type: 'POST',
      url: '/teacher/delete',
      data: {
       'id':data,
       'user':user
      },
      dataType: 'json',
      success: function( result ){
       if(result == 'success'){
        location.reload();
       }else{
        $('.msj').html('<div class="alert alert-danger alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Oops!</strong> EL teacher tiene dependencias y no se puede eliminar.\
									</div>');
       }
      }
     });
    }
   },{
    label:'No',
    cssClass: 'btn-blue',
    action: function(dialog) {
     dialog.close();
    }
   }]
  });
 });

 $('#addStudent').on('click',function(){
  var form = '<div class = "msj">\
        </div><form action=""  method="post"  name="form1" id="form1" data-parsley-validate><div class="">\
            <div class="row">\
        <div class="col-md-4">\
        <div class="form-group">\
        <label class="control-label" for="identification">\
        No. Identificación</label>\
        <input type="text" name="identification" class="form-control" placeholder="" id="identification" data-parsley-type="integer" required/>\
        </div>\
        </div>\
        <div class="col-md-8">\
        <div class="form-group">\
        <label class="control-label" for="fullname">\
        Nombre Completo</label>\
        <input type="text" class="form-control" placeholder="" id="fullname" required>\
        </div>\
        </div>\
        </div>\
       <div class="row">\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="datebirth">\
        Fecha de nacimiento</label>\
        <input type="date" name="datebirth" class="form-control" placeholder="" id="datebirth" required/>\
        </div>\
        </div>\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="email">\
        Correo electrónico</label>\
        <input type="text" class="form-control" placeholder="" id="email" data-parsley-type="email" required>\
        </div>\
        </div>\
        </div>\
        <div class="row">\
        <div class="col-md-12">\
        <div class="form-group">\
        <label class="control-label" for="username">\
        Nombre de usuario</label>\
        <input type="text" name="username" class="form-control" placeholder="" id="username" required/>\
        </div>\
        </div>\
        </div>\
        <div class="row">\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="firstpassword">\
        Contraseña</label>\
        <input type="password" name="firstpassword" class="form-control" placeholder="" id="firstpassword" required/>\
        </div>\
        </div>\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="password">\
        Repita la contraseña</label>\
        <input type="password" class="form-control" placeholder="" id="password" data-parsley-equalto="#firstpassword" required>\
        </div>\
        </div>\
        </div>\
        <div class="row">\
        <div class="col-md-12">\
        <div class="form-group">\
        <label class="control-label" for="office">\
        Apodo</label>\
        <input type="text" name="nickname" class="form-control" placeholder="" id="nickname"/>\
        </div>\
        </div>\
        </div>\
            </form>';
  BootstrapDialog.show({
   onshown:function(){
    $('#form1').parsley();
   },onhidden:function(){
    location.reload();
   },
   message: form,
   type: BootstrapDialog.TYPE_DEFAULT,
   cssClass: 'md-row-dialog',
   closable: true,
   closeByBackdrop: false,
   closeByKeyboard: false,
   title: 'Datos Estudiante',
   buttons: [{
    label: 'Guardar',
    cssClass: 'btn-default',
    action: function(dialog) {
     $('#form1').parsley().validate();
     if( $('#form1').parsley().isValid()){
      $.ajax({
       type: 'POST',
       url: '/student/insert',
       data: {
        'identification': $('#identification').val(),
        'fullname': $('#fullname').val(),
        'datebirth': $('#datebirth').val(),
        'email': $('#email').val(),
        'username': $('#username').val(),
        'password': $('#password').val(),
        'nickname': $('#nickname').val()
       },
       dataType: 'json',
       success: function( result ){
        if(result == 'success'){
         $('.msj').html('<div class="alert alert-success alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Muy bien!</strong> El estudiante se creo con éxito.\
									</div>');
        }else{
         $('.msj').html('<div class="alert alert-danger alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Oops!</strong> EL estudiante ya existe o hay valores repetidos con otro estudiante.\
									</div>');
        }
       }
      });
     }
    }
   }]
  });

 });
 $('.editStudent').on('click',function(){
  var data = $(this).data('id');
  var user =  $(this).data('user');
  var form = '<div class = "msj">\
        </div><form action=""  method="post"  name="form1" id="form1" data-parsley-validate><div class="">\
            <div class="row">\
        <div class="col-md-4">\
        <div class="form-group">\
        <label class="control-label" for="identification">\
        No. Identificación</label>\
        <input readonly type="text" name="identification" class="form-control" placeholder="" id="identification" data-parsley-type="integer" required/>\
        </div>\
        </div>\
        <div class="col-md-8">\
        <div class="form-group">\
        <label class="control-label" for="fullname">\
        Nombre Completo</label>\
        <input type="text" class="form-control" placeholder="" id="fullname" required>\
        </div>\
        </div>\
        </div>\
       <div class="row">\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="datebirth">\
        Fecha de nacimiento</label>\
        <input type="date" name="datebirth" class="form-control" placeholder="" id="datebirth" required/>\
        </div>\
        </div>\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="email">\
        Correo electrónico</label>\
        <input type="text" class="form-control" placeholder="" id="email" data-parsley-type="email" required>\
        </div>\
        </div>\
        </div>\
        <div class="row">\
        <div class="col-md-12">\
        <div class="form-group">\
        <label class="control-label" for="username">\
        Nombre de usuario</label>\
        <input readonly type="text" name="username" class="form-control" placeholder="" id="username" required/>\
        </div>\
        </div>\
        </div>\
        <div class="row">\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="firstpassword">\
        Contraseña</label>\
        <input type="password" name="firstpassword" class="form-control" placeholder="" id="firstpassword"/>\
        </div>\
        </div>\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="password">\
        Repita la contraseña</label>\
        <input type="password" class="form-control" placeholder="" id="password" data-parsley-equalto="#firstpassword">\
        </div>\
        </div>\
        </div>\
         <div class="row">\
        <div class="col-md-12">\
        <div class="form-group">\
        <label class="control-label" for="office">\
        Apodo</label>\
        <input type="text" readonly name="nickname" class="form-control" placeholder="" id="nickname"/>\
        </div>\
        </div>\
        </div>\
            </form>';
  BootstrapDialog.show({
   onshown:function(){
    $('#form1').parsley();
    $.ajax({
     type: 'POST',
     url: '/student/findbyid',
     data: {
      'id': data
     },
     dataType: 'json',
     success: function( result ){
      $.each(result, function(i,val){
       $('#identification').val(val.identification);
       $('#fullname').val(val.full_name);
       $('#datebirth').val(val.date_of_birth);
       $('#email').val(val.email);
       $('#username').val(val.user_name);
       $('#nickname').val(val.nickname);
      });
     }
    });
   },onhidden:function(){
    location.reload();
   },
   message: form,
   type: BootstrapDialog.TYPE_DEFAULT,
   cssClass: 'md-row-dialog',
   closable: true,
   closeByBackdrop: false,
   closeByKeyboard: false,
   title: 'Datos Estudiante',
   buttons: [{
    label: 'Guardar',
    cssClass: 'btn-default',
    action: function(dialog) {
     $('#form1').parsley().validate();
     if( $('#form1').parsley().isValid()){
      $.ajax({
       type: 'POST',
       url: '/student/update',
       data: {
        'identification': $('#identification').val(),
        'fullname': $('#fullname').val(),
        'datebirth': $('#datebirth').val(),
        'email': $('#email').val(),
        'password': $('#password').val(),
        'nickname': $('#nickname').val(),
        'id':data,
        'user':user
       },
       dataType: 'json',
       success: function( result ){
        if(result == 'success'){
         $('.msj').html('<div class="alert alert-success alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Muy bien!</strong> El estudiante se actualizó con éxito.\
									</div>');
        }else{
         $('.msj').html('<div class="alert alert-danger alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Oops!</strong> Hay valores repetidos con otro estudiante.\
									</div>');
        }
       }
      });
     }
    }
   }]
  });
 });
 $('.deleteStudent').on('click',function(){
  var data = $(this).data('id');
  var user = $(this).data('user');
  BootstrapDialog.show({
   message: '<div class="msj"></div><p>Está seguro de eliminar este registro?</p>',
   type: BootstrapDialog.TYPE_DANGER,
   size: BootstrapDialog.SIZE_SMALL,
   cssClass: 'modal',
   closable: true,
   closeByBackdrop: false,
   closeByKeyboard: false,
   title: 'Datos Estudiantes',
   buttons: [{
    label: 'Si',
    cssClass: 'btn-danger',
    action: function(dialog) {
     $.ajax({
      type: 'POST',
      url: '/student/delete',
      data: {
       'id':data,
       'user':user
      },
      dataType: 'json',
      success: function( result ){
       if(result == 'success'){
        location.reload();
       }else{
        $('.msj').html('<div class="alert alert-danger alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Oops!</strong> EL estudiante tiene dependencias y no se puede eliminar.\
									</div>');
       }
      }
     });
    }
   },{
    label:'No',
    cssClass: 'btn-blue',
    action: function(dialog) {
     dialog.close();
    }
   }]
  });
 });

 $('.manageCareer').on('click',function(){
  var career = $(this).data('id');
  var form = '<div class = "msj">\
        </div><form action=""  method="post"  name="form1" id="form1" data-parsley-validate><div class="">\
            <div class="row">\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="subject">\
        Materias</label>\
        <select required name="subject" class="chosen form-control" id="subject">\
        <option value="">Seleccione materia</option>\
        </select>\
        </div>\
        </div>\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="name">\
        Profesor</label>\
       <select required name="teacher" class="chosen form-control" id="teacher">\
       <option value="">Seleccione profesor</option>\
       </select>\
        </div>\
        </div>\
        </div>\
            </form>';
  BootstrapDialog.show({
   onshown:function(){
    $.ajax({
     type: 'POST',
     url: '/subject/list',
     data: {
     },
     dataType: 'json',
     success: function( result ){
      $.each(result, function(key,row){
       $('#subject').append('' +
          '<option value="'+row['id_subject']+'">'+row['name']+'</option>');
      });
     }
    });
    $.ajax({
     type: 'POST',
     url: '/teacher/list',
     data: {
     },
     dataType: 'json',
     success: function( result ){
      $.each(result, function(key,row){
       $('#teacher').append('' +
          '<option value="'+row['id_teacher']+'">'+row['full_name']+'</option>');

      });
      $(".chosen").chosen();
     }
    });
    $('#form1').parsley();
   },onhidden:function(){
    location.reload();
   },
   message: form,
   type: BootstrapDialog.TYPE_DEFAULT,
   cssClass: 'md-row-dialog',
   closable: true,
   closeByBackdrop: false,
   closeByKeyboard: false,
   title: 'Datos Carrera',
   buttons: [{
    label: 'Guardar',
    cssClass: 'btn-default',
    action: function(dialog) {
     $('#form1').parsley().validate();
     if( $('#form1').parsley().isValid()){
      $.ajax({
       type: 'POST',
       url: '/career/manage',
       data: {
        career: career,
        subject: $('#subject').val(),
        teacher: $('#teacher').val()
       },
       dataType: 'json',
       success: function( result ){
        if(result == 'success'){
         $('.msj').html('<div class="alert alert-success alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Muy bien!</strong> Datos almacenados.\
									</div>');
        }else{
         $('.msj').html('<div class="alert alert-danger alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Oops!</strong> Datos erroneos.\
									</div>');
        }
       }
      });
     }
    }
   }]
  });
 });
 $('#addCareer').on('click',function(){
  var form = '<div class = "msj">\
        </div><form action=""  method="post"  name="form1" id="form1" data-parsley-validate><div class="">\
            <div class="row">\
        <div class="col-md-4">\
        <div class="form-group">\
        <label class="control-label" for="code">\
        Código</label>\
        <input type="text" name="code" class="form-control" placeholder="" id="code" required/>\
        </div>\
        </div>\
        <div class="col-md-8">\
        <div class="form-group">\
        <label class="control-label" for="name">\
        Nombre</label>\
        <input type="text" class="form-control" placeholder="" id="name" required>\
        </div>\
        </div>\
        </div>\
       <div class="row">\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="credits">\
        Créditos</label>\
        <input type="text" name="credits" class="form-control" placeholder="" id="credits" required/>\
        </div>\
        </div>\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="amount">\
        Valor semestre</label>\
        <input type="text" class="form-control" placeholder="" id="amount"  required>\
        </div>\
        </div>\
        </div>\
        <div class="row">\
        <div class="col-md-12">\
        <div class="form-group">\
        <label class="control-label" for="semesters">\
        Semestres</label>\
        <input type="text" name="semesters" class="form-control" placeholder="" id="semesters" required/>\
        </div>\
        </div>\
        </div>\
            </form>';
  BootstrapDialog.show({
   onshown:function(){
    $('#form1').parsley();
   },onhidden:function(){
    location.reload();
   },
   message: form,
   type: BootstrapDialog.TYPE_DEFAULT,
   cssClass: 'md-row-dialog',
   closable: true,
   closeByBackdrop: false,
   closeByKeyboard: false,
   title: 'Datos Carrera',
   buttons: [{
    label: 'Guardar',
    cssClass: 'btn-default',
    action: function(dialog) {
     $('#form1').parsley().validate();
     if( $('#form1').parsley().isValid()){
      $.ajax({
       type: 'POST',
       url: '/career/insert',
       data: {
        code: $('#code').val(),
        name: $('#name').val(),
        credits: $('#credits').val(),
        amount: $('#amount').val(),
        semester: $('#semesters').val()
       },
       dataType: 'json',
       success: function( result ){
        if(result == 'success'){
         $('.msj').html('<div class="alert alert-success alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Muy bien!</strong> La carrera se creo con éxito.\
									</div>');
        }else{
         $('.msj').html('<div class="alert alert-danger alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Oops!</strong> EL carrera ya existe o hay valores repetidos con otro estudiante.\
									</div>');
        }
       }
      });
     }
    }
   }]
  });
 });
 $('.editCareer').on('click',function(){
  var data = $(this).data('id');
  var form = '<div class = "msj">\
        </div><form action=""  method="post"  name="form1" id="form1" data-parsley-validate><div class="">\
            <div class="row">\
        <div class="col-md-4">\
        <div class="form-group">\
        <label class="control-label" for="code">\
        Código</label>\
        <input readonly type="text" name="code" class="form-control" placeholder="" id="code" required/>\
        </div>\
        </div>\
        <div class="col-md-8">\
        <div class="form-group">\
        <label class="control-label" for="name">\
        Nombre</label>\
        <input type="text" class="form-control" placeholder="" id="name" required>\
        </div>\
        </div>\
        </div>\
       <div class="row">\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="credits">\
        Créditos</label>\
        <input type="text" name="credits" class="form-control" placeholder="" id="credits" required/>\
        </div>\
        </div>\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="amount">\
        Valor semestre</label>\
        <input type="text" class="form-control" placeholder="" id="amount"  required>\
        </div>\
        </div>\
        </div>\
        <div class="row">\
        <div class="col-md-12">\
        <div class="form-group">\
        <label class="control-label" for="semesters">\
        Semestres</label>\
        <input type="text" name="semesters" class="form-control" placeholder="" id="semesters" required/>\
        </div>\
        </div>\
        </div>\
            </form>';
  BootstrapDialog.show({
   onshown:function(){
    $('#form1').parsley();
    $.ajax({
     type: 'POST',
     url: '/career/findbyid',
     data: {
      'id': data
     },
     dataType: 'json',
     success: function( result ){
      $.each(result, function(i,val){
       $('#code').val(val.code);
       $('#name').val(val.name);
       $('#credits').val(val.quantity_credits);
       $('#amount').val(val.amount);
       $('#semesters').val(val.quantity_semester);
      });
     }
    });
   },onhidden:function(){
    location.reload();
   },
   message: form,
   type: BootstrapDialog.TYPE_DEFAULT,
   cssClass: 'md-row-dialog',
   closable: true,
   closeByBackdrop: false,
   closeByKeyboard: false,
   title: 'Datos Carrera',
   buttons: [{
    label: 'Guardar',
    cssClass: 'btn-default',
    action: function(dialog) {
     $('#form1').parsley().validate();
     if( $('#form1').parsley().isValid()){
      $.ajax({
       type: 'POST',
       url: '/career/update',
       data: {
        code: $('#code').val(),
        name: $('#name').val(),
        credits: $('#credits').val(),
        amount: $('#amount').val(),
        semester: $('#semesters').val(),
        id: data
       },
       dataType: 'json',
       success: function( result ){
        if(result == 'success'){
         $('.msj').html('<div class="alert alert-success alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Muy bien!</strong> La carrera se actualizó con éxito.\
									</div>');
        }else{
         $('.msj').html('<div class="alert alert-danger alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Oops!</strong> EL carrera ya existe o hay valores repetidos con otro estudiante.\
									</div>');
        }
       }
      });
     }
    }
   }]
  });
 });
 $('.deleteCareer').on('click',function(){
  var data = $(this).data('id');
  BootstrapDialog.show({
   message: '<div class="msj"></div><p>Está seguro de eliminar este registro?</p>',
   type: BootstrapDialog.TYPE_DANGER,
   size: BootstrapDialog.SIZE_SMALL,
   cssClass: 'modal',
   closable: true,
   closeByBackdrop: false,
   closeByKeyboard: false,
   title: 'Datos Estudiantes',
   buttons: [{
    label: 'Si',
    cssClass: 'btn-danger',
    action: function(dialog) {
     $.ajax({
      type: 'POST',
      url: '/career/delete',
      data: {
       'id':data
      },
      dataType: 'json',
      success: function( result ){
       if(result == 'success'){
        location.reload();
       }else{
        $('.msj').html('<div class="alert alert-danger alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Oops!</strong> La carrera tiene dependencias y no se puede eliminar.\
									</div>');
       }
      }
     });
    }
   },{
    label:'No',
    cssClass: 'btn-blue',
    action: function(dialog) {
     dialog.close();
    }
   }]
  });
 });

 $('#addSubject').on('click', function () {
  var form = '<div class = "msj">\
        </div><form action=""  method="post"  name="form1" id="form1" data-parsley-validate><div class="">\
            <div class="row">\
        <div class="col-md-4">\
        <div class="form-group">\
        <label class="control-label" for="code">\
        Código</label>\
        <input type="text" name="code" class="form-control" placeholder="" id="code" required/>\
        </div>\
        </div>\
        <div class="col-md-8">\
        <div class="form-group">\
        <label class="control-label" for="name">\
        Nombre</label>\
        <input type="text" class="form-control" placeholder="" id="name" required>\
        </div>\
        </div>\
        </div>\
       <div class="row">\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="credits">\
        Créditos</label>\
        <input type="text" name="credits" class="form-control" placeholder="" id="credits" required/>\
        </div>\
        </div>\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="cycles">\
        Ciclos</label>\
        <input type="text" class="form-control" placeholder="" id="cycles" required>\
        </div>\
        </div>\
        </div>\
        <div class="row">\
        <div class="col-md-12">\
        <div class="form-group">\
        <label class="control-label" for="room">\
        Aula</label>\
        <input type="text" name="room" class="form-control" placeholder="" id="room" required/>\
        </div>\
        </div>\
        </div>\
        <div class="row">\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="description">\
        Descripción</label>\
        <textarea name="description" class="form-control" placeholder="" id="description" required></textarea>\
        </div>\
        </div>\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="hours">\
        Horas semanales</label>\
        <input type="text" class="form-control" placeholder="" id="hours" required>\
        </div>\
        </div>\
        </div>\
        <div class="row">\
        <div class="col-md-12">\
        <div class="form-group">\
        <label class="control-label" for="places">\
        Cupos disponibles</label>\
        <input type="text" name="places" class="form-control"  placeholder="" id="places"/>\
        </div>\
        </div>\
        </div>\
            </form>';
  BootstrapDialog.show({
   onshown: function () {
    $('#form1').parsley();
   }, onhidden: function () {
    location.reload();
   },
   message: form,
   type: BootstrapDialog.TYPE_DEFAULT,
   cssClass: 'md-row-dialog',
   closable: true,
   closeByBackdrop: false,
   closeByKeyboard: false,
   title: 'Datos Materia',
   buttons: [{
    label: 'Guardar',
    cssClass: 'btn-default',
    action: function (dialog) {
     $('#form1').parsley().validate();
     if ($('#form1').parsley().isValid()) {
      $.ajax({
       type: 'POST',
       url: '/subject/insert',
       data: {
        code: $('#code').val(),
        name: $('#name').val(),
        credits: $('#credits').val(),
        cycle: $('#cycles').val(),
        room: $('#room').val(),
        description: $('#description').val(),
        hours: $('#hours').val(),
        place: $('#places').val()
       },
       dataType: 'json',
       success: function (result) {
        if (result == 'success') {
         $('.msj').html('<div class="alert alert-success alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Muy bien!</strong> La materia se creo con éxito.\
									</div>');
        } else {
         $('.msj').html('<div class="alert alert-danger alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Oops!</strong> La materia ya existe o hay valores repetidos con otra materia.\
									</div>');
        }
       }
      });
     }
    }
   }]
  });
 });

 $('.manageStudent').on('click',function(){
  var student = $(this).data('user');
  var form = '<div class = "msj">\
        </div><form action=""  method="post"  name="form1" id="form1" data-parsley-validate><div class="">\
            <div class="row">\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="subject">\
        Carrera</label>\
        <select required name="career" class="chosen form-control" id="career">\
        <option value="">Seleccione carrera</option>\
        </select>\
        </div>\
        </div>\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="name">\
        Materia</label>\
       <select required name="subject" class="chosen form-control" id="subject">\
       <option value="">Seleccione materia</option>\
       </select>\
        </div>\
        </div>\
        </div>\
            </form>\
            <div class="row">\
            <div class="col-md-12 table-responsive">\
            <table id="dataSubjectStudent" class="table table-hover table-striped table-bordered">\
            <thead>\
            <tr>\
            <th>Carrera</th><th>Codigo</th><th>Nombre</th><th></th>\
            </tr>\
            </thead>\
            <tbody></tbody>\
            </table>\
            </div>\
            </div>';
  BootstrapDialog.show({
   onshown:function(){
    $.ajax({
     type: 'POST',
     url: '/student/subjects',
     data: {
     },
     dataType: 'json',
     success: function( result ){
      $.each(result, function(key,row){
       $('#career').append('' +
          '<option value="'+row['id_career']+'">'+row['name']+'</option>');
      });
      $(".chosen").chosen();
     }
    });

    $.ajax({
     type: 'POST',
     url: '/career/list',
     data: {
     },
     dataType: 'json',
     success: function( result ){
      $.each(result, function(key,row){
       $('#career').append('' +
          '<option value="'+row['id_career']+'">'+row['name']+'</option>');
      });
      $(".chosen").chosen();
     }
    });

    $('#career').on('change',function(){
     $('#subject').html('');$('#subject').append('<option value="">Seleccione materia</option> ');
     var career = $(this).val();
     $.ajax({
      type: 'POST',
      url: '/subject/ListByIdCareer',
      data: {
       career : career
      },
      dataType: 'json',
      success: function( result ){
       $.each(result, function(key,row){
        $('#subject').append('' +
           '<option value="'+row['id_subject']+'">'+row['name']+'</option>');

       });
       $(".chosen").trigger("chosen:updated");
      }
     });

    });
    $('#form1').parsley();
   },onhidden:function(){
    location.reload();
   },
   message: form,
   type: BootstrapDialog.TYPE_DEFAULT,
   cssClass: 'md-row-dialog',
   closable: true,
   closeByBackdrop: false,
   closeByKeyboard: false,
   title: 'Datos Materias Estudiantes',
   buttons: [{
    label: 'Guardar',
    cssClass: 'btn-default',
    action: function(dialog) {
    // $('#form1').parsley().validate();
     if( $('#form1').parsley().isValid()){
      $.ajax({
       type: 'POST',
       url: '/student/manage',
       data: {
        student: student,
        subject: $('#subject').val(),
       },
       dataType: 'json',
       success: function( result ){
        if(result == 'success'){
         $('.msj').html('<div class="alert alert-success alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Muy bien!</strong> Datos almacenados.\
									</div>');
        }else{
         $('.msj').html('<div class="alert alert-danger alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Oops!</strong> Datos erroneos.\
									</div>');
        }
       }
      });
     }
    }
   }]
  });
 });



 $('.editSubject').on('click', function () {
  var data = $(this).data('id');
  var form = '<div class = "msj">\
        </div><form action=""  method="post"  name="form1" id="form1" data-parsley-validate><div class="">\
            <div class="row">\
        <div class="col-md-4">\
        <div class="form-group">\
        <label class="control-label" for="code">\
        Código</label>\
        <input type="text" readonly name="code" class="form-control" placeholder="" id="code" required/>\
        </div>\
        </div>\
        <div class="col-md-8">\
        <div class="form-group">\
        <label class="control-label" for="name">\
        Nombre</label>\
        <input type="text" class="form-control" placeholder="" id="name" required>\
        </div>\
        </div>\
        </div>\
       <div class="row">\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="credits">\
        Créditos</label>\
        <input type="text" name="credits" class="form-control" placeholder="" id="credits" required/>\
        </div>\
        </div>\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="cycles">\
        Ciclos</label>\
        <input type="text" class="form-control" placeholder="" id="cycles" required>\
        </div>\
        </div>\
        </div>\
        <div class="row">\
        <div class="col-md-12">\
        <div class="form-group">\
        <label class="control-label" for="room">\
        Aula</label>\
        <input type="text" name="room" class="form-control" placeholder="" id="room" required/>\
        </div>\
        </div>\
        </div>\
        <div class="row">\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="description">\
        Descripción</label>\
        <textarea name="description" class="form-control" placeholder="" id="description" required></textarea>\
        </div>\
        </div>\
        <div class="col-md-6">\
        <div class="form-group">\
        <label class="control-label" for="hours">\
        Horas semanales</label>\
        <input type="text" class="form-control" placeholder="" id="hours" required>\
        </div>\
        </div>\
        </div>\
        <div class="row">\
        <div class="col-md-12">\
        <div class="form-group">\
        <label class="control-label" for="places">\
        Cupos disponibles</label>\
        <input type="text" name="places" class="form-control"  placeholder="" id="places"/>\
        </div>\
        </div>\
        </div>\
            </form>';
  BootstrapDialog.show({
   onshown: function () {
    $('#form1').parsley();
    $.ajax({
     type: 'POST',
     url: '/subject/findbyid',
     data: {
      'id': data
     },
     dataType: 'json',
     success: function (result) {
      $.each(result, function (i, val) {
       $('#code').val(val.code);
       $('#name').val(val.name);
       $('#credits').val(val.quantity_credits);
       $('#cycles').val(val.cycle);
       $('#room').val(val.room);
       $('#description').val(val.description);
       $('#hours').val(val.weekly_hours);
       $('#places').val(val.place_available);
      });
     }
    });
   }, onhidden: function () {
    location.reload();
   },
   message: form,
   type: BootstrapDialog.TYPE_DEFAULT,
   cssClass: 'md-row-dialog',
   closable: true,
   closeByBackdrop: false,
   closeByKeyboard: false,
   title: 'Datos Materia',
   buttons: [{
    label: 'Guardar',
    cssClass: 'btn-default',
    action: function (dialog) {
     $('#form1').parsley().validate();
     if ($('#form1').parsley().isValid()) {
      $.ajax({
       type: 'POST',
       url: '/subject/update',
       data: {
        code: $('#code').val(),
        name: $('#name').val(),
        credits: $('#credits').val(),
        cycle: $('#cycles').val(),
        room: $('#room').val(),
        description: $('#description').val(),
        hours: $('#hours').val(),
        place: $('#places').val(),
        id: data
       },
       dataType: 'json',
       success: function (result) {
        if (result == 'success') {
         $('.msj').html('<div class="alert alert-success alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Muy bien!</strong> La materia se actualiz&oacute; con éxito.\
									</div>');
        } else {
         $('.msj').html('<div class="alert alert-danger alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Oops!</strong> La materia ya existe o hay valores repetidos con otra materia.\
									</div>');
        }
       }
      });
     }
    }
   }]
  });

 });
 $('.deleteSubject').on('click', function () {
  var data = $(this).data('id');
  BootstrapDialog.show({
   message: '<div class="msj"></div><p>Está seguro de eliminar este registro?</p>',
   type: BootstrapDialog.TYPE_DANGER,
   size: BootstrapDialog.SIZE_SMALL,
   cssClass: 'modal',
   closable: true,
   closeByBackdrop: false,
   closeByKeyboard: false,
   title: 'Datos Estudiantes',
   buttons: [{
    label: 'Si',
    cssClass: 'btn-danger',
    action: function (dialog) {
     $.ajax({
      type: 'POST',
      url: '/subject/delete',
      data: {
       'id': data
      },
      dataType: 'json',
      success: function (result) {
       if (result == 'success') {
        location.reload();
       } else {
        $('.msj').html('<div class="alert alert-danger alert-dismissable">\
									<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\
									<strong>Oops!</strong> La materia tiene dependencias y no se puede eliminar.\
									</div>');
       }
      }
     });
    }
   }, {
    label: 'No',
    cssClass: 'btn-blue',
    action: function (dialog) {
     dialog.close();
    }
   }]
  });
 });
});