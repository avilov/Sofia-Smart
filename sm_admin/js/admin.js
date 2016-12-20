$(document).ready(function(){
// Функция подтверждения удаления на сайте -------------------------------------
function confirmDel() {
    if (confirm("Удалить запись?")) {
        return true;
    } else {
        return false;
    }
}
// ВЫПАДАЮЩЕЕ МЕНЮ -------------------------------------------------------------
    
// ВЫБОР ЯЗЫКА -----------------------------------------------------------------
    $('.langButton div').click(function(){
        var active = $(this).attr('id');
        $('.langButton div').removeClass('active');
        $('#'+active).addClass('active');
        $('.language').css('display','none');
        $('#lang_'+active).css('display','block');
    });
// ПРОВЕРКА НА УДЕЛЕНИЕ -----------------------------------------------------------------
    $('.del').click(function(){
//        confirm('Вы действительно хотите удалить данный материал?');
        if (confirm("Вы действительно хотите удалить данный материал?")) {
            return true;
        }
        else {
            return false;
        }
    });
// AJAX ПОДГРУЗКА --------------------------------------------------------------
   $('.right a').click(function(click){
//        click.preventDefault();
        var table = $(this).attr('link');
        var id = $(this).attr('id');
//        alert(table);
        $.ajax ({
          type: 'POST',  ///тип запроса  GET либо POST
          url: 'views/blocks/'+table+'.php', //ваш контроллер или отдельный аякс контроллер
          data: {table:table, id:id}, // передаваемые в php-обработчик параметры(будут доступны в $_POST['podcat'], $_POST['var2'] и тд)
          success: function(data) {   ///если ajax-запрос прошел удачно и сервер вернул код 200
              if (data['error']) {alert(data['error']);}
              else {
                  $('.edit form').html(data);//добавляем ответ обработчика в контентный элемент
              }
          }
        });
        $('.edit').fadeIn(300);
     });
     $('.edit .close').click(function(){
        $('.edit').fadeOut(300);
        $('.edit form').empty();//// очистка контентного элемента перед загрузкой данных
    });
// JQUERY UI --------------------------------------------------------------
    $(function() {
        $('#sortContainer').sortable({
            placeholder: 'emptySpace',
            containment: 'parent'
        });
        $('.saveOrder').click(function() {
            var order = $('#sortContainer').sortable("toArray");
            for (var i = 0; i < order.length; i++) {
                console.log("Position: " + i + " ID: " + order[i]);
            }
            var table = $('.saveOrder').attr('table');
            $.ajax ({
            type: 'POST',  ///тип запроса  GET либо POST
            url: 'views/blocks/changeOrder.php', //ваш контроллер или отдельный аякс контроллер
            data: {table:table, id:order}, // передаваемые в php-обработчик параметры(будут доступны в $_POST['podcat'], $_POST['var2'] и тд)
            success: function(data) {   ///если ajax-запрос прошел удачно и сервер вернул код 200
                if (data['error']) {alert(data['error']);}
                else {
                    $('.edit form').html(data);//добавляем ответ обработчика в контентный элемент
                    alert('Изменения сохранены!');
                }
            }
          });
        })
    });
}); // !конец функции Document.rady ===========================================!