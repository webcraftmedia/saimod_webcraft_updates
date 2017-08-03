function init_saimod_mojotrollz_vote() {
    register_server_edit();
    register_server_visible();
    register_server_del();
    register_server_save();
};

function register_server_edit(){
    $('.btn_server_edit').click(function(){
        $('#input_id').val($(this).attr('_id'));
        $('#input_name').val($(this).attr('_name'));
        $('#input_url').val($(this).attr('_url'));
        $('#input_version').val($(this).attr('_version'));
        $('#input_description').val($(this).attr('_description'));
        $("#btn_server_save").focus();
    });
}

function register_server_visible(){
    $('.btn_server_visible').click(function(){
        $.ajax({    type :'GET',
                    url  : './sai.php?sai_mod=.SAI.saimod_mojotrollz_vote&action=visible'+
                            '&id='+$(this).attr('_id')+
                            '&visible='+$('#select_visible_'+$(this).attr('_i')).val(),
                    success : function(data) {
                        if(data.status){
                            system.reload();
                        }else{
                            alert('Problem: '+data);}
                    }
        });
    });
}

function register_server_del(){
    $('.btn_server_del').click(function(){
        if (confirm("Delete Server Permanently?") === true) {
            $.ajax({    type :'GET',
                        url  : './sai.php?sai_mod=.SAI.saimod_mojotrollz_vote&action=del'+
                                '&id='+$(this).attr('_id'),
                        success : function(data) {
                            if(data.status){
                                system.reload();
                            }else{
                                alert('Problem: '+data);}
                        }
            });
        }
    });
}

function register_server_save(){
    $('#btn_server_save').click(function() {
        var id = $('#input_id').val();
        var name = $('#input_name').val();
        var url = $('#input_url').val();
        var version = $('#input_version').val();
        var description = $('#input_description').val();
        $.ajax({url: './sai.php',
                data: { sai_mod: '.SAI.saimod_mojotrollz_vote',
                        action: 'save',
                        id: id,
                        name: name,
                        url: url,
                        version: version,
                        description: description},
                type: 'GET',
                success: function(data) {
                    if(data.status){
                        system.reload();
                    }else{
                        alert('Problem: '+data);}
                }
        });
    });
}