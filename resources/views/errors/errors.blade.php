@if (count($errors) > 0)
        <!-- 表单错误清单 -->
<div class="alert alert-danger">
    <strong>Attention 请注意！</strong>

    <br><br>

    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif