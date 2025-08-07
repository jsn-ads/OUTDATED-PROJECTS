import { SafeAreaView, StatusBar, StyleSheet, Text } from "react-native";
import { TvItem } from "./components/TvItem";

const twoSixApp = () =>{
  return(
    <SafeAreaView>
      <StatusBar barStyle="light-content"backgroundColor="#FFF"/>
      <Text style={style.title}>TwoSixApp</Text>
      <Text style={style.subtitle}>Televisores em Promoção</Text>
      <TvItem></TvItem>
      <TvItem></TvItem>
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

export default twoSixApp