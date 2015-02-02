
    function vote(voteWeight) {
        $('#content').on('click', '.vote a', function () {
            var votelink = $(this);
            $(this).siblings('.rate').html(function (i, val) {
                jQuery.ajax({
                    type: 'POST',
                    url: votelink.attr('href'),
                    sign: votelink.data('sign'),
                    success: function (response) {
                        //
                    },
                    error: function() {
                        return false
                    }
                });
                if(votelink.data('sign') == 'minus')
                    return val - voteWeight;
                return parseInt(val) + voteWeight;
            });
            return false
        });
    }
