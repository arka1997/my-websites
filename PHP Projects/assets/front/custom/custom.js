var BASE_URL = $('meta[name="base-url"]').attr('content');

// CARAOUSEL SLIDER FOR DESTINATION BANNER FOR DETAILS AND MULTIPLE REVIEWS COMMENTS \\
    // for fetching the star rating from the database and show them one by one with this function  \\
    $(function () {

        var total_rating = $('#total_rating').val();
        
        for (var i = 0; i < total_rating; i++) {
            var rating_value = $(".star_rating" + i).val();
        
            var rating = (rating_value == "") ? 0 : rating_value;
        
            $(".rateyo-readonly-widg" + i).rateYo({
                rating: rating,
                numStars: 5,
                precision: 2,
                minValue: 1,
                maxValue: 5,
            }).on("rateyo.change", function (e, data) {
                $('.star_rating' + $(this).data('key')).val(data.rating);
            });
        }
        });