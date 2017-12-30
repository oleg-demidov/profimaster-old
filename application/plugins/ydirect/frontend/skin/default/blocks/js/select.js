$(document).ready(function(){
    $('input:checkbox').change(function() {
        if($(this).prop('checked')){
            $('select[name="category_master[]"] > option[value='+$(this).attr('name')+']').prop('selected', true);
        }else{
            $('select[name="category_master[]"] > option[value='+$(this).attr('name')+']').prop('selected', false);
        }

    });
});