import { SafeAreaView, StatusBar, StyleSheet, Text } from "react-native";
import { TvItem } from "./components/TvItem";

const twoSevenApp = () =>{
  return(
    <SafeAreaView>
      <StatusBar barStyle="light-content"backgroundColor="#FFF"/>
      <Text style={style.title}>TowSevenApp</Text>
      <Text style={style.subtitle}>Televisores em Promoção</Text>
      <TvItem name={'SAMSUNG XL7500M55'} mark={'SAMSUNG'} model={'ZX7500M'} inch={55} price={3000} originalPrice={3500}></TvItem>
      <TvItem name={'LG MT4300X50'} mark={'LG'} model={'MT4300X'} inch={50} price={3000} originalPrice={3000}></TvItem>
    </SafeAreaView>
  );
}

// css

const style = StyleSheet.create({
  title: {
    fontSize : 24,
    color    : '#FF0000',
    textAlign: 'center'
  },
  subtitle :{
    fontSize : 17,
    color : '#999',
    textAlign : 'center'
  }
}) ;

export default twoSevenApp