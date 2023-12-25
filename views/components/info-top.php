<div class="col-lg-12 d-block" id="show_info">
    <script>
        $(() => {
            $.get('./routes/user.route.php', {
                method: 'get_info'
            }, (data) => {
                const res = JSON.parse(data);
                if (res.success === false) {
                    $('#show_info').html(res.message);
                    return;
                }
                const html = `<div class="row d-flex">
                                    <div class="col-md pr-4 d-flex topper align-items-center">
                                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                                        <span class="text">${res.data.username}</span>
                                    </div>
                                        <div class="col-md pr-4 d-flex topper align-items-center">
                                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                                        <span class="text">${res.data.email}</span>
                                </div>
                                </div>`
                $('#show_info').html(html)
            })
        })
    </script>
</div>