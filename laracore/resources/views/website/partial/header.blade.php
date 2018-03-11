<!-- Top bar -->
<div class="top-bar">
  <div class="container">
    <p>{{ option('site_name') }}</p>
    <div class="right-sec">
      <div class="social-top"> 
          [header-social]
      </div>
    </div>
  </div>
</div>

<!-- Header -->
<header>
  <div class="container">
    <div class="logo"> <a href="/"><img width="80px" src="{{ option('site_logo') }}" alt="" ></a> </div>

    <div class="search-cate">
      <form action="{{ route('product.search') }}" method="GET">
        <select name="category" class="selectpicker">
            <option value="">Tất cả danh mục</option>
            @foreach(get_product_categories() as $value)
              <option value="{{ $value->id }}">{{ $value->name }}</option>
            @endforeach
        </select>
        <input type="search" name="q" placeholder="Tìm kiếm ...">
        <button class="submit" type="submit"><i class="icon-magnifier"></i></button>
      </form>
    </div>
    <!-- Cart Part -->
    <ul class="nav navbar-right cart-pop">
      <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="itm-cont">3</span> <i class="flaticon-shopping-bag"></i> <strong>My Cart</strong> <br>
        <span>3 item(s) - $500.00</span></a>
        <ul class="dropdown-menu">
          <li>
            <div class="media-left"> <a href="#." class="thumb"> <img src="{{ $asset_url }}/images/item-img-1-1.jpg" class="img-responsive" alt="" > </a> </div>
            <div class="media-body"> <a href="#." class="tittle">Funda Para Ebook 7" 128GB full HD</a> <span>250 x 1</span> </div>
          </li>
          <li>
            <div class="media-left"> <a href="#." class="thumb"> <img src="{{ $asset_url }}/images/item-img-1-2.jpg" class="img-responsive" alt="" > </a> </div>
            <div class="media-body"> <a href="#." class="tittle">Funda Para Ebook 7" full HD</a> <span>250 x 1</span> </div>
          </li>
          <li class="btn-cart"> <a href="#." class="btn-round">View Cart</a> </li>
        </ul>
      </li>
    </ul>
  </div>
  
  <!-- Nav -->
  <nav class="navbar ownmenu">
    <div class="container"> 
      
      <!-- Categories -->
      <div class="cate-lst"> <a  data-toggle="collapse" class="cate-style" href="#cater"><i class="fa fa-list-ul"></i> Danh mục sản phẩm </a>
        <div class="cate-bar-in">
          <div id="cater" class="collapse">
            <ul>
                @foreach(get_product_categories() as $value)
                  <li class="{{ $value->child->isNotEmpty() ? 'sub-menu' : '' }}"><a href="{{ $value->link }}">{{ $value->name }}</a>
                      @if($value->child->isNotEmpty())
                        <ul>
                          @foreach($value->child as $value2)
                            <li><a href="{{ $value2->link }}">{{ $value2->name }}</a></li>
                          @endforeach
                        </ul>
                      @endif
                  </li>
                @endforeach
              </ul>
          </div>
        </div>
      </div>
      
      <!-- Navbar Header -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-open-btn" aria-expanded="false"> <span><i class="fa fa-navicon"></i></span> </button>
      </div>
      <!-- NAV -->
      <div class="collapse navbar-collapse" id="nav-open-btn">
        <ul class="nav">
          @foreach(menu('main-menu') as $item)
              @if($item->child->isNotEmpty())
                <li class="dropdown"> <a href="{{ $item->link }}" class="dropdown-toggle" data-toggle="dropdown">{{ $item->label }}</a>
                  <ul class="dropdown-menu multi-level animated-2s fadeInUpHalf">
                    @foreach($item->child as $item2)
                      <li><a href="{{ $item2->link }}">{{ $item2->label }} </a></li>
                    @endforeach
                  </ul>
                </li>
              @else
                <li> <a href="{{ $item->link }}">{{ $item->label }}</a></li>
              @endif
          @endforeach
        </ul>
      </div>
      
      <!-- NAV RIGHT -->
      <div class="nav-right"> <span class="call-mun"><i class="fa fa-phone"></i> <strong>Hotline:</strong> {{ option('site_phone') }}</span> </div>
    </div>
  </nav>
</header>