function fillCustomer()
{
    $.ajax({
        url:'/api/customers',
        method:'GET',
        dataType:'json',
        headers:{'token':window.localStorage['token']},
        success:(res)=>{
            var data = res.data.data;
            var content = '';

            for(var i=0; i < data.length; i++){
                var item = data[i];
                content += `<option value='${item.id}'>${item.first_name} ${item.last_name}</option>`;
            }
            $('select[name=customer_id]').html(content);
        },
        error:(res, status, err)=>{
            alert('Terjadi kesalahan baca data isi select customer');
        }
    });
}

function fillProduct()
{
    $.ajax({
        url:'/api/products',
        method:'GET',
        dataType:'json',
        headers:{'token':window.localStorage['token']},
        success:(res)=>{
            var data = res.data.data;
            var content = '';
            for(var i=0; i < data.length; i++){
                var item = data[i];
                content+=`<option value='${item.id}'>${item.title} (${item.category})</option>`;
            }
            $('select[name=product_id]').html(content);
        },
        error:(res,status,err)=>{
            alert('Terjadi kesalahan baca data isi select Product')
        }
    });
}

function save(id)
{
    $('button#action').attr("id", "simpan");
    $.ajax({
        url:'/api/orders' + (id !== undefined ? `/${id}` : ''),
        method: id !== undefined ? 'PATCH' : 'POST',
        dataType:'json',
        data:{
            'product_id' : $('select[name=product_id]').val(),
            'customer_id' : $('select[name=customer_id]').val(),
            'qty' : $('input[name=qty]').val()
        },
        headers: {'token' : window.localStorage['token']},
        success:(res)=>{
            console.log('sukses', res);
            alert('data order berhasil direkam');
            $('#modalOrder').modal('hide');
            refreshData();
        },
        error:(res, status, err)=>{
            console.log('error : ', res);
            alert('Order gagal direkam');
        }
    });
}

document.addEventListener('DOMContentLoaded', (c)=>{
    fillCustomer();
    fillProduct();
  

    $('button#simpan').on('click', (e)=>{
        save();
    });
});