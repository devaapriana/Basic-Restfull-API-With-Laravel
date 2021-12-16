// tunggu hingga documen selesai di muat
document.addEventListener('DOMContentLoaded', (c)=>{

    $('button#btn-login').on('click', ()=>{
        var email = $('input[name=email]').val();
        var sandi = $('input[name=password]').val();

        $.ajax({
            url: '/api/auth',
            dataType: 'json',
            method: 'GET',
            headers: {
                'Authorization': 'basic '+window.btoa(email+':'+sandi)
            },
            success:(msg)=>{
                console.log(msg)
                alert(`Selamat datang ${msg.data.first_name} ${msg.data.last_name}`);
                window.localStorage.setItem('token', msg.data.token);
                window.location = '/api/list-order';
            },
            error:(req, status, err)=>{
                console.log(req);
                alert(req.responseJSON.error[0]);
            }
        });
    });

});