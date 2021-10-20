<section class="grid">
        <article class="grid-item">
            <div class="image">
                <img src="{{$item['image']}}" />
            </div>
            <div class="info">
                <h2>{{$item['title']}}</h2>
                <div class="info-text">
                    <p>{{$item['fullText']}}</p>
                </div>
            </div>
        </article>
</section>
<style>
    .grid * {
        box-sizing: border-box;
    }
    .grid {
        display: grid;
        column-gap: 30px;
        row-gap: 30px;
        padding: 20px 0;
        margin: 0 auto;
        max-width: 700px;
    }

    .grid-item {
        box-shadow: 0 2px 5px rgba(0,0,0,0.2), 0 4px 6px rgba(0,0,0,0.2);
        transition: box-shadow .3s;
        width: 100%;
        height: 100%;
    }
    .grid-item .image {
        height: 200px;
        overflow: hidden;
    }
    .grid-item .info {
        position: relative;
        height: calc(100% - 200px);
        padding: 16px 14px 80px 14px;
    }
    .grid-item:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.2), 0 16px 20px rgba(0,0,0,0.2);
    }
    .grid-item .image img  {
        transition: transform 280ms ease-in-out;
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .grid-item:hover .image img  {
        transform: scale(1.1);
    }
    .info h2 {
        font-family: 'Roboto Condensed', Тahoma, sans-serif;
        color: #337AB7;
        font-size: 24px;
        font-weight: normal;
        margin: 0;
        text-align: center;
    }
    .info-text p {
        font-size: 15px;
        line-height: 20px;
        font-family: Verdana, sans-serif;
        margin-bottom: 10px;
    }
    .info-text p:last-child {
        margin-bottom: 0;
    }
    .grid-item .button-wrap {
        display: block;
        width: 100%;
        position: absolute;
        bottom: 14px;
        left: 0;
        text-align: center;
    }

    .atuin-btn {
        display: inline-flex;
        text-decoration: none;
        position: relative;
        font-size: 20px;
        line-height: 20px;
        padding: 12px 30px;
        color: #FFF;
        font-weight: bold;
        text-transform: uppercase;
        font-family: 'Roboto Condensed', Тahoma, sans-serif;
        background: #337AB7;
        cursor: pointer;
        border: 2px solid #BFE2FF;
    }
    .atuin-btn:hover,
    .atuin-btn:active,
    .atuin-btn:focus {
        color: #FFF;
    }
    .atuin-btn:after,
    .atuin-btn:before {
        position: absolute;
        height: 4px;
        left: 50%;
        background: #337AB7;
        bottom: -6px;
        content: "";
        transition: all 280ms ease-in-out;
        width: 0;
    }
    .atuin-btn:before {
        top: -6px;
    }
    .atuin-btn:hover:after,
    .atuin-btn:hover:before,
    .atuin-btn:active:after,
    .atuin-btn:active:before,
    .atuin-btn:focus:after,
    .atuin-btn:focus:before {
        width: 100%;
        left: 0;
    }
</style>