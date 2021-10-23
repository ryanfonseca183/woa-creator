$(function(){
    let imgWrapper = $(".img-wrapper"), 
        imgPreview = $(".img-preview");

    $(".img-picker").change(function(){
        const [file] = $(this)[0].files;
        //Verifica se algum arquivo foi selecionado
        if(!file) return;

        //Verifica se o elemento de exibição foi criado
        if(!imgPreview.length) {
            imgWrapper.append(`<img class="img-preview img-fluid" />`);
            imgPreview = $('.img-preview', imgWrapper);
        }
        //Atualiza a imagem em exibição
        $(".img-preview").prop('src', URL.createObjectURL(file));
    });
})