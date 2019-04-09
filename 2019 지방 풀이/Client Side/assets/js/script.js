/*
[앨범리스트]
- [DONE] SIDE메뉴에는 music_data.json의 데이터를 이용하여 Category별로 음원을 구분하는 메뉴를 제작한다.
- [DONE] SIDE메뉴의 Category 또는 ALL을 클릭하면 해당 하는 앨범목록 또는 전체목록이 Content 영역에 음원발매일 기준 내림차순으로 정렬하여
  앨범자켓이미지, 앨범이름, 아티스트, 발매일, 가격, 쇼핑카트담기에 대한 정확한 정보를 보여준다.
- [DONE] TITLE에 선택된 Category 이름을 표시한다.
- [DONE] 앨범검색 INPUT에 검색어를 입력하고 검색 버튼을 클릭하거나 Enter키를 누르면 해당 Category의 앨범에서 앨범이름 또는 가수명이 검색어에 포함되는 앨범목록을 모두 보여 준다.
- [DONE] 검색어와 일치하는 앨범이름 또는 가수명의 검색키워드를 하이라이트로 표시한다.
- [DONE] 검색어와 일치하는 앨범이 없을 경우 “검색된 앨범이 없습니다.” 라고 나타낸다.
- [DONE] 카트담기, 추가하기 버튼을 클릭하면 상단 카트정보에 앨범수량과 가격이 합산되어 보여지며 카트담기 버튼은 추가하기 버튼 으로 변경된다.
- [DONE] 추가하기 버튼 에는 현재 해당앨범이 카트에 담긴 수량을 표시한다.

[쇼핑카트]
- [DONE] 상단 카트정보를 클릭하면 Modal창이 열리고 카트에 담긴 앨범목록을 모두 보여준다. 목록에는 앨범정보[앨범자켓이미지, 앨범이름, 아티스트, 발매일], 가격, 수량, 합계, 삭제에 대한 정확정보를 보여준다.
- [DONE] 수량을 1이상 입력할 수 있으며 수량 변경 시 합계 금액과 총 합계금액이 자동으로 계산 되어 표시되고 앨범리스트에서 해당 앨범목록의 추가하기 버튼의 앨범수량 및 상단 카트 정보에도 적용되어 나타나도록 제작한다.
- [DONE] 삭제 버튼을 클릭하면 “정말 삭제 하시겠습니까?” 문구를 보여주고 확인을 클릭하면 해 당 앨범목록이 쇼핑카트에서 삭제된다.
- [DONE] 결제하기 버튼을 클릭하면 “결제가 완료되었습니다.” 문구를 보여주고 쇼핑카트의 앨범목 록이 모두 삭제되고 Modal창이 닫힌다.
- [DONE] 쇼핑카트에는 총 합계금액을 나타낸다.

[공통]
- [DONE] 앨범리스트, 쇼핑카트의 모든 정보가 브라우저를 종료하고 다시 접속하여도 정상적으로 유지되어야 한다.
- [DONE] 가격정보가(가격, 합계, 총 합계금액) 4자리 이상일 경우 3자리마다 콤마(,)를 표기하고 ₩단위를 나타낸다.
*/
const toNumber = date => Number(date.split('.').join(''))

// Model
const model = {
  musicData: [],
  currentCategory: 'ALL',
  searchKeyword: '',
  cart: [
    // { music, count }
  ]
}
const initModel = result => {
  result.data.sort((a, b) => {
    return toNumber(b.release) - toNumber(a.release)
  })
  model.musicData = result.data
  loadModel()
}
const saveModel = () => {
  const {currentCategory, searchKeyword, cart} = model
  localStorage.setItem('model', JSON.stringify({currentCategory, searchKeyword, cart}))
}
const loadModel = () => {
  const modelInStorage = localStorage.getItem('model')
  if (modelInStorage) {
    Object.assign(model, JSON.parse(modelInStorage))
  }
}
const fetchMusicData = () => {
  return fetch('./music_data.json').then(response => response.json())
}
const setCurrentCategory = category => {
  model.currentCategory = category
  saveModel()
}
const getCurrentCategoryMusic = () => {
  const currentCategory = model.currentCategory
  if (currentCategory === 'ALL') {
    return model.musicData
  }
  return model.musicData.filter(({category}) => category === currentCategory)
}
const searchMusicData = musicData => {
  if (!model.searchKeyword) {
    return musicData
  }
  return musicData.filter(({albumName, artist}) => {
    return albumName.includes(model.searchKeyword) || artist.includes(model.searchKeyword)
  })
}
const getCategories = () => {
  const categories = new Set()
  model.musicData.forEach(({category}) => {
    categories.add(category)
  })
  return categories
}
const setSearchKeyword = keyword => {
  model.searchKeyword = keyword
  saveModel()
}
const addMusicInCart = (artist, albumName) => {
  const musicInCart = findMusicInCart(artist, albumName)
  if (musicInCart) {
    musicInCart.count++
  } else {
    const music = model.musicData.find(music => isSameMusic(music, artist, albumName))
    model.cart.push({music, count: 1})
  }
  saveModel()
}
const clearCart = () => {
  model.cart = []
  saveModel()
}
const removeMusicInCart = (artist, albumName) => {
  const index = model.cart.findIndex(({music}) => isSameMusic(music, artist, albumName))
  model.cart.splice(index, 1)
  saveModel()
}
const changeCountOfMusic = (artist, albumName, count) => {
  const musicInCart = findMusicInCart(artist, albumName)
  musicInCart.count = Number(count)
  saveModel()
}
const findMusicInCart = (artist, albumName) => {
  return model.cart.find(({music}) => isSameMusic(music, artist, albumName))
}
const isSameMusic = (music, artist, albumName) => music.artist === artist && music.albumName === albumName

// View
const showCategory = () => {
  let html = `<li data-category="ALL">
    <a href="#" class="${model.currentCategory === 'ALL' ? 'active-menu' : ''}">
      <i class="fa fa-th-list fa-2x"></i><span>ALL</span>
    </a>
  </li>`
  for (const category of getCategories()) {
    const isCurrentCategory = model.currentCategory === category
    html += `<li data-category="${category}">
        <a href="#" class="${isCurrentCategory ? 'active-menu' : ''}"><i class="fa fa-youtube-play fa-2x"></i> <span>${category}</span></a>
    </li>`
  }

  const mainMenu = $('#main-menu')
  mainMenu.find('li:not(.text-center)').remove()
  mainMenu.append(html)

  $('#main-menu .search .form-control').val(model.searchKeyword)
}
const showTitle = () => {
  $('#page-inner h2').html(model.currentCategory)
}
const showContents = () => {
  const musicData = searchMusicData(getCurrentCategoryMusic())
  const container = $('.contents.col-md-12')

  if (musicData.length === 0) {
    container.html('검색된 앨범이 없습니다.')
    return
  }
  const html = musicData
    .map(({albumJaketImage, albumName, artist, release, price}) => {
      const musicInCart = findMusicInCart(artist, albumName)
      return `<div class="col-md-2 col-sm-2 col-xs-2 product-grid">
        <div class="product-items">
          <div class="project-eff">
            <img class="img-responsive" src="images/${albumJaketImage}" alt="${albumName}">
          </div>
          <div class="produ-cost">
            <h5>${highlightSearchKeyword(albumName)}</h5>
            <span>
              <i class="fa fa-microphone"> 아티스트</i> 
              <p>${highlightSearchKeyword(artist)}</p>
            </span>
            <span>
              <i class="fa  fa-calendar"> 발매일</i> 
              <p>${release}</p>
            </span>
            <span>
              <i class="fa fa-money"> 가격</i>
              <p>￦${addComma(price)}원</p>
            </span>
            <span class="shopbtn">
              <button 
                class="btn btn-default btn-xs" 
                data-artist="${artist}"
                data-album-name="${albumName}">
                <i class="fa fa-shopping-cart"></i> 
                ${musicInCart ? `추가하기 (${musicInCart.count}개)` : '쇼핑카트담기'}
              </button>
            </span>
          </div>
        </div>
      </div>`
    })
    .join('')
  container.html(html)
}
const showCart = () => {
  const total = {price: 0, count: 0}
  model.cart.forEach(({music, count}) => {
    total.price += parseInt(music.price) * count
    total.count += count
  })
  $('.navbar .panel-body > .btn').html(
    `<i class="fa fa-shopping-cart"></i> 쇼핑카트 <strong>${total.count}</strong> 개 금액 ￦ ${addComma(total.price)}원`
  )

  const html = model.cart.map(({music, count}) => {
    return `<tr>
      <td class="albuminfo">
        <img src="images/${music.albumJaketImage}">
        <div class="info">
          <h4>${music.albumName}</h4>
          <span>
            <i class="fa fa-microphone"> 아티스트</i> 
            <p>${music.artist}</p>
          </span>
          <span>
            <i class="fa  fa-calendar"> 발매일</i> 
            <p>${music.release}</p>
          </span>
        </div>
      </td>
      <td class="albumprice">￦ ${addComma(music.price)}</td>
      <td class="albumqty">
        <input 
          type="number" 
          class="form-control" 
          value="${count}"
          data-artist="${music.artist}"
          data-album-name="${music.albumName}">
      </td>
      <td class="pricesum">￦ ${addComma(parseInt(music.price) * count)}</td>
      <td>
        <button 
          class="btn btn-default" 
          data-artist="${music.artist}"
          data-album-name="${music.albumName}">
            <i class="fa fa-trash-o"></i> 삭제
        </button>
      </td>
    </tr>`
  })
  $('.modal-body tbody').html(html)
  $('.totalprice span').text(`￦${addComma(total.price)}`)
}
const highlightSearchKeyword = str => {
  if (!model.searchKeyword) {
    return str
  }
  return str.replace(
    new RegExp(model.searchKeyword, 'g'),
    `<span style="background-color: #ffff00; display: inline">${model.searchKeyword}</span>`
  )
}
const addComma = price => parseInt(price).toLocaleString()
const initView = () => {
  showCategory()
  showTitle()
  showContents()
  showCart()
}

// Controller
const initController = () => {
  $(document)
    .on('click', '#main-menu li:not(.text-center)', function () {
      setCurrentCategory($(this).data('category'))
      initView()
    })
    .on('keyup', '#main-menu .search .form-control', function (event) {
      setSearchKeyword($(this).val().trim())
      if (event.keyCode == 13) {
        initView()
      }
    })
    .on('click', '#main-menu .search .btn', initView)
    .on('click', '.shopbtn .btn', function () {
      const [artist, albumName] = getAttrs($(this), ['artist', 'album-name'])
      addMusicInCart(artist, albumName)
      initView()
    })
    .on('click', '.modal-footer .btn-primary', function () {
      alert("결제가 완료되었습니다.")
      $("#myModal").modal('hide')
      clearCart()
      initView()
    })
    .on('click', '.modal-body tbody .btn', function () {
      if (!confirm('정말 삭제 하시겠습니까?')) {
        return
      }
      const [artist, albumName] = getAttrs($(this), ['artist', 'album-name'])
      removeMusicInCart(artist, albumName)
      initView()
    })
    .on('blur', '.albumqty .form-control', function () {
      const input = $(this)
      if (input.val() < 1) {
        input.val(1)
      }
      const [artist, albumName] = getAttrs(input, ['artist', 'album-name'])
      changeCountOfMusic(artist, albumName, input.val())
      initView()
    })
}
const getAttrs = (elem, attrNames) => {
  return attrNames.map((name) => String(elem.data(name)))
}

fetchMusicData().then((result) => {
  initModel(result)
  $(() => {
    initView()
    initController()
  })
})