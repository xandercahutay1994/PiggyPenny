//=========================
//  SPINNER WHEN BUTTON IS CLICKED
//=========================
$('#register').click(function(){
    this.form.submit();
    this.disabled=true;
    this.innerHTML='<i class="fa fa-spinner fa-spin"></i> Loading…';
});


//=========================
//  FILE/MEDIA UPLOAD
//=========================
$('#file').change(function(){
    filePreview(this);
});

function filePreview(input){
    if(input.files && input.files[0]){
        var reader = new window.FileReader();
        reader.onload = function(e){
            $('#uploadForm + img').remove();
            $('#uploadForm').after('<img class="img-rounded" src="'+e.target.result+'" width="300px" height="150px"/>');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
