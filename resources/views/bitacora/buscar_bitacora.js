function buscar_datos(consulta)
{
    $.ajax({
        url: '/bitacora',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
})
    .done()
}