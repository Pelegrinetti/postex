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
                                    <td><i class="fas fa-caret-down"></i></td>
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