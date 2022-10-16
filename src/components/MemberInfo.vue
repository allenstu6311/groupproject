<template>
  <div class="member-info col-5">
    <div class="member-title">
      <h3 class="bold">訂單資訊</h3>
    </div>
    <div class="member-synchronize">
      <input type="checkbox" v-model="check" />同訂購人資訊
    </div>
    <div class="member-body">
      <div class="member-name">
        <label for="name">姓名:</label>
        <input type="text" size="30" name="name" v-model="name" />
      </div>
      <div class="member-cellphone">
        <label for="cellphone">手機:</label>
        <input type="text" size="30" name="cellphone" v-model="cellphone" />
      </div>
      <div class="member-address">
        <label for="address">地址:</label>
        <input type="text" size="30" name="address" v-model="address" />
      </div>
      <div class="member-transport">
        <div class="delivery">
          <label for="transport">配送方式:</label>
        </div>
        <div class="method">
          <h5><input type="radio" name="transport" value="home" @focus="homeDelivery=true;sevenCheck=false" >宅配到府</h5>
          <div class="home-delivery" v-if="homeDelivery==true">
            <input type="text" size="30" name="address" v-model="address" @focus="homeDelivery=true"  />
          </div>
          <h5>
            <input
              type="radio"
              name="transport"
              v-model="sevenCheck"
              value="true"
              @focus="sevenCheck=true;homeDelivery=false"
            
            />7-11取貨付款
          </h5>
          <div class="info" v-for="item in post" :key="item">
            
            <p v-if="sevenCheck==true">門市:<input type="text" :value="item.POIName" ></p>
            <p v-if="sevenCheck==true">地址:<input type="text" :value="item.sevenAddress"></p>
          </div>
          <div class="map-box" v-if="sevenCheck==true">
            <select name="" id="" v-model="city" @change="filterShop(city)">
              <option value="1">請選擇</option>
              <option
                v-for="item in location"
                :key="item.CityName"
                :value="item.CityName"
              >
                {{ item.CityName }}
              </option>
            </select>
            <select name="" id="" v-model="position" @change="searchShop">
              <option value="1">請選擇</option>
              <option
                v-for="item in township"
                :key="item.AreaName"
                :value="item.AreaName"
              >
                {{ item.AreaName }}
              </option>
            </select>

            <select
              name=""
              id=""
              v-model="seven"
              @change="
                removeMap();
                updateMap(seven);
              "
            >
              <option v-for="item in store" :key="item.POIName" :value="item">
                {{ item.POIName }}門市
              </option>
            </select>
          </div>
           <div id="sevenMap" v-show="sevenCheck==true"></div>
        </div>
      </div>
      <div class="member-pay">
        <div class="pay">
          <label for="pay">付款方式:</label>
        </div>
        <div class="methods">
          <h5><input type="radio" name="pay" value="online"  @focus="onlinePayList=true"/>線上付款</h5>
          <div class="online-pay" v-if="onlinePayList==true" style="line-height:2">
            <input type="text" placeholder="信用卡卡號" style="margin-bottom:10px">
            <input type="text" placeholder="到期日" style="width:60%;margin-right: 10px">
            <input type="text" placeholder="驗證碼" style="width:35%">
          </div>
          <h5><input type="radio" name="pay" value="pick"  @focus="onlinePayList=false"/>取貨付款</h5>
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
* {
  box-sizing: border-box;
}
#sevenMap {
  width: 300px;
  height: 300px;
}
img {
    max-height: 100%;
}
.my-leaflet-map-container img {
    max-height: none;
}

</style>

<script>
import L from "leaflet";
import "leaflet/dist/leaflet.css";

const blackIcon = new L.Icon({
  iconUrl:
    "https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-black.png",
  shadowUrl:
    "https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png",
  iconSize: [25, 41],
  iconAnchor: [12, 41],
  popupAnchor: [1, -34],
  shadowSize: [41, 41],
});
export default {
  data() {
    return {
      member: [],
      check: false,
      name: "",
      cellphone: "",
      address: "",
      sevenCheck: false,
      homeDelivery:false,
      map: null,
      shop: [],
      location: [],
      city: "1",
      position: "1",
      store: [],
      url: "",
      seven: "",
      sevenAddress: [],
      post: [],
      onlinePayList:false,
      POIName:'',
      sevenPosition:"",
      
    };
  },
  methods: {
    onlinePay(e){

    },
    
    filterShop(CityName) {
      switch (CityName) {
        case "桃園市":
          this.url =
            "https://run.mocky.io/v3/e2268f5b-b822-414a-88ae-fe012fceb3cf";
          break;
        case "臺北市":
          this.url =
            "https://run.mocky.io/v3/35c99fa6-b3c2-4a4d-8803-0612ca115085";
          break;
        case "南投縣":
          this.url =
            "https://run.mocky.io/v3/721bf04e-fa05-46c5-9bd3-8658b17b4d70";
          break;
        case "臺中市":
          this.url="https://run.mocky.io/v3/c5cf6ffe-d567-404c-9806-ee337c789854";
           break;
        case "臺南市":
          this.url="https://run.mocky.io/v3/cd67b8f2-f688-405c-a792-16f8f50ad43d";
           break;
        case "臺東市":
          this.url="https://run.mocky.io/v3/6ec1183b-d847-4f30-9cf4-9db12e0aa2ce";
           break;
        case "嘉義市":
          this.url="https://run.mocky.io/v3/f49a840e-abf3-4678-8121-e73d58f38889";
           break;
        case "嘉義縣":
          this.url="https://run.mocky.io/v3/b959f79e-3d65-4987-9277-8d9a9feada0a";
          break;
        case "基隆市":
          this.url="https://run.mocky.io/v3/28679e0e-a5aa-41c2-81d4-ac3ae3eb57d3";
          break;
        case "宜蘭縣":
          this.url="https://run.mocky.io/v3/9f1a0cd3-22d0-4992-bf42-6fd45042a9ed";
          break;
        case "屏東縣":
          this.url="https://run.mocky.io/v3/a51a6fa9-0432-46a4-97ad-8895f8fb067c";
          break;
        case "彰化縣":
          this.url="https://run.mocky.io/v3/a6e982b3-02e5-4fc7-a0c2-24d6950b8248";
          break;
        case "新竹市":
          this.url="https://run.mocky.io/v3/76063865-4a12-42ce-8280-0b126ccdeb31";
          break;
         case "新北市":
          this.url="https://run.mocky.io/v3/5da854dc-e88c-4491-b99f-985aa033f616";
          break;
      }
      this.axios.get(this.url).then((res) => {
        this.shop = res.data.stores;
      });
      this.position = this.township[0].AreaName;
    },
   
    initMap() {
          setTimeout(function () {
    window.dispatchEvent(new Event('resize'));
      }, 100);
      this.map = L.map("sevenMap").setView([25.056, 121.501], 13);

      L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution:
          '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      }).addTo(this.map);

      L.marker([51.5, -0.09], { icon: blackIcon }).addTo(this.map);
    },
    searchShop() {
      let index = this.shop.filter((item) => item.area === this.position);
      this.store = index;
    },
    updateMap(seven) {

      this.post = [];
      this.sevenAddress = [
        {
          POIName: this.seven.POIName,
          sevenAddress: this.seven.Address,
        },
         
      ];
      this.map.setView([`${this.seven.Y}`, `${this.seven.X}`], 13);
      L.marker([`${this.seven.Y}`, `${this.seven.X}`], { icon: blackIcon })
        .addTo(this.map)
        .bindPopup(
          `
        <div style="text-align:center;width:100px">
        <strong>${this.seven.POIName}門市</strong>
    
                <img style="width:40%;height:40%;margin:auto;" src="https://emap.pcsc.com.tw/ecmap/images/711_sl_36X36.gif">
            
                      <p style="font-size:13px">${this.seven.Address}<br>
                    
                      <button onclick="addAddress()">確認</button>
        </div>`
        )
        .openPopup();
         this.$emit("sevenInfo",this.sevenAddress)
    },
    addAddress() {
      this.post = this.sevenAddress;
    },
    removeMap() {
      this.map.eachLayer((layer) => {
        if (layer instanceof L.Marker) {
          this.map.removeLayer(layer);
        }
      });
    },
  },
  computed: {
    township() {
      return this.location.find((item) => item.CityName === this.city)
        ?.AreaList;
    },
    
  },
  watch: {
    check: {
      handler(newVal) {
        if (newVal == true) {
          this.name = this.member.memName;
          this.cellphone = this.member.memPhone;
          this.address = this.member.memAddress;
        } else {
          (this.name = ""), (this.cellphone = ""), (this.address = "");
        }
      },
    },
    sevenCheck:{
      handler(newVal){
        if(newVal==true){
          this.initMap()
        }
      }
    }
  },
  created() {
    let members = sessionStorage.getItem("member");
    this.member =JSON.parse( members)

    this.axios
      .get("https://run.mocky.io/v3/f6678602-bce5-4221-b235-55c9ffa39c05") //鄉鎮
      .then((res) => {
        this.location = res.data;
      });
  },
  mounted() {
    // this.initMap();
    window.addAddress = this.addAddress;
  },
  updated(){
    
  }
};
</script>
