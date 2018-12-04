<div class="col-md-4">
    <div class="sidebar">
        <div class="d-help-side-widget">
            <h4 class="side-widget-tittle">查找</h4>
            <div class="d-help-commet-field">
                <form action="{{ url('search') }}" method="post">
                    {{ csrf_field() }}
                    <input placeholder="" name="search" type="text" value="" style="width: 80%"  size="30" required>
                    <button type="submit" class="btn-lg btn-success" ><i class="fa fa-search"  ></i></button>
                </form>
            </div>
        </div>
    </div>
</div>