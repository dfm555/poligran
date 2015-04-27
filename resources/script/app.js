/**
 * Created by root on 23/03/15.
 */
$(document).ready(function(){
    /*Modals forms*/
    $('#addAdmin').on('click',function(){
        var form = '<form action=""  method="post"  name="form1" id="form1" data-parsley-validate><div class="">\
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
        <input type="text" name="datebirth" class="form-control" placeholder="" id="datebirth" required/>\
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
        <input type="password" name="office" class="form-control" placeholder="" id="office" required/>\
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
                    if( $('#form1').parsley().isValid()){
                        alert();
                    }else{
                        dialog.getModalContent().find('form').submit();

                    }

                }
            }]
        });

    });

    $('#addTeacher').on('click',function(){
        var form = '<form action=""  method="post"  name="form1" id="form1" data-parsley-validate><div class="">\
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
        <input type="text" name="datebirth" class="form-control" placeholder="" id="datebirth" required/>\
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
        <input type="password" name="office" class="form-control" placeholder="" id="office" required/>\
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
                    if( $('#form1').parsley().isValid()){
                        alert();
                    }else{
                        dialog.getModalContent().find('form').submit();

                    }

                }
            }]
        });

    });

    $('#addStudent').on('click',function(){
        var form = '<form action=""  method="post"  name="form1" id="form1" data-parsley-validate><div class="">\
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
        <input type="text" name="datebirth" class="form-control" placeholder="" id="datebirth" required/>\
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
        <input type="text" name="apodo" class="form-control" readonly placeholder="" id="apodo"/>\
        </div>\
        </div>\
        </div>\
            </form>';
        BootstrapDialog.show({
            onshown:function(){
                $('#form1').parsley();
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
                    if( $('#form1').parsley().isValid()){
                        alert();
                    }else{
                        dialog.getModalContent().find('form').submit();

                    }

                }
            }]
        });

    });

    $('#addCareer').on('click',function(){
        var form = '<form action=""  method="post"  name="form1" id="form1" data-parsley-validate><div class="">\
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
                    if( $('#form1').parsley().isValid()){
                        alert();
                    }else{
                        dialog.getModalContent().find('form').submit();

                    }

                }
            }]
        });
    });

    $('#addSubject').on('click',function(){
        var form = '<form action=""  method="post"  name="form1" id="form1" data-parsley-validate><div class="">\
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
            onshown:function(){
                $('#form1').parsley();
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
                action: function(dialog) {
                    if( $('#form1').parsley().isValid()){
                        alert();
                    }else{
                        dialog.getModalContent().find('form').submit();

                    }

                }
            }]
        });

    });
});