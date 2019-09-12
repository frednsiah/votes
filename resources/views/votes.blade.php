<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Votes</title>
  </head>
  <body>
    <div class="container">
        <table class="table">
            <thead>
              <tr>
                <th>Color</th>
                <th>Votes</th>
              </tr>
            </thead>
            <tbody>
              @foreach($colors as $color)
                <tr>
                    <td><a href="JavaScript:Void(0);" id="populateVote" data-color-id="{{$color->id}}">{{$color->name}}</a></td>
                    <td></td>
                </tr>
              @endforeach
                <tr>
                    <td><a href="JavaScript:Void(0);" id="getTotal">Total</a></td>
                    <td></td>
                </tr>
            </tbody>
          </table>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $('.table').on('click', '#populateVote', function(e){
            e.preventDefault();
            $this = $(this);
            getVotes($this.data('colorId')).then(function(data){
                $this.parent().next().text(data.data.votes);
            })
            .fail(function (xhr, error) {
                alert(xhr.statusText);
            });
        });

        $('#getTotal').click(function(e) {
            e.preventDefault();
            getTotal($( ".table tbody" ), 'a[id="populateVote"]', $(this));
        })

        function getVotes($color_id) {
            return $.ajax({
                url: "{{url('/color')}}/" + $color_id,
                type: 'GET',
                dataType: 'json'
            });
        }

        function getTotal($search_parent_el, $el_search_selector, $totalElement) {
            $voteRows = $search_parent_el.find($el_search_selector);
            sum = 0;
            $voteRows.each(function() {
                $text = $(this).parent().next().text();
                if($text) {
                    sum = sum + parseInt($text);
                }
            });

            return $totalElement.parent().next().text(sum);
        }
    </script>
  </body>
</html>