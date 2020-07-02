/* Debounce function */

function debounce(callback, ms) {
    let timer = null;
    return function() {
      clearTimeout(timer)
      timer = setTimeout(callback.bind(this), ms)
    }
  }

/* Search correspondences */

$(document).ready(function() {
    
    var token = $('meta[name="csrf-token"]').attr('content');
    
    $('#search-recipient').keyup(debounce(function() {
        $.ajax({
            url: "correspondences/search",
            type: "post",
            data: {
                "_token": token,
                query: $(this).val()
            },
            dataType: 'json',
            success: function(response) {
                if (response.data.length !== 0) {
                    $('tbody').html(response.data.map(function(recipient) {
                        return `<tr>
                                    <td>${recipient.id}</td>
                                    <td>${recipient.recipient}</td>
                                    <td>${recipient.street}</td>
                                    <td>${recipient.number}</td>
                                    <td>${recipient.neighborhood}</td>
                                    <td>${recipient.city}</td>
                                    <td>${recipient.uf}</td>
                                    <td>${recipient.cep}</td>
                                    <td class="dropdown">
                                        <div class="dropdown-toggle">
                                            <i class="fas fa-chevron-circle-down"></i>
                                        </div>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="correspondences/edit/${recipient.id}"><i class="fas fa-pen"></i>Editar</a>
                                                <a href="correspondences/delete/${recipient.id}"><i class="fas fa-trash"></i>Deletar</a>
                                            </li>
                                        </ul>
                                    </td>
                                <tr>`;
                    }));
                } else {
                    $('tbody').html(`<tr>
                                        <td colspan="9">Nenhuma correspondência encontrada.</td>
                                    </tr>`)
                }
            }
        })
    },500))
})

/* Actions */

$('.table').click(function(e) {
    var target = e.target;
    $('.dropdown-menu').each(function() {
        /* Mapping click area */
        var menu = $(this).prev('.dropdown-toggle');
        var svg = $(menu).children('svg');
        var path = $(svg).children('path');
        if (menu[0] == target || svg[0] == target || path[0] == target) $(this).toggle();
        else $(this).hide();
    });
});
