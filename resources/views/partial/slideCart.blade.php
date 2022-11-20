<div class="d-flex justify-content-center mt-5 border-bottom" style="line-height:3vw ;">
    <div style="margin-right:5%;">
        <h5>
            <a href="{{ route('cart') }}" style="text-decoration: none; color:aliceblue;"><i class="bx bx-cart"></i>Cart</a>
        </h5>
    </div>
    <div style="margin-right:3vw ; color:aliceblue">
        <h1>|</h1>
    </div>
    <div style="margin-right:5%;">
        <h5>
            <a href="{{ route('check') }}" style="text-decoration: none; color:aliceblue;"><i class="bx bx-check-square"></i> Check</a>
        </h5>
    </div>
    <div style="margin-right:3vw ; color:aliceblue">
        <h1>|</h1>
    </div>
    <div>
        <h5>
            <a href="{{ route('history') }}" style="text-decoration: none; color:aliceblue;"><i class="bx bx-check-square"></i> History</a>
        </h5>
    </div>

</div>
<style>
    h5 {
        color: #666;
        display: inline-block;
        margin: 0;
        text-transform: uppercase;
    }

    h5:after {
        display: block;
        content: '';
        border-bottom: solid 3px #019fb6;
        transform: scaleX(0);
        transition: transform 250ms ease-in-out;
    }

    h5:hover:after {
        transform: scaleX(1);
    }

    h5.fromRight:after {
        transform-origin: 100% 50%;
    }

    h5.fromLeft:after {
        transform-origin: 0% 50%;
    }
</style>
