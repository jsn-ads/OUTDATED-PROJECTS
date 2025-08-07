import { Alert, Button, SafeAreaView, StatusBar, StyleSheet, Text } from "react-native";
import { TvItem } from "./components/TvItem";

const twoNineApp = () =>{

  const handleButton = () =>{
      Alert.alert("Parabens !!! você recebeu 10% de desconto");
  }

  return(
    <SafeAreaView>
      <StatusBar barStyle="light-content"backgroundColor="#FFF"/>
      
      <Text style={style.title}>TwoNineApp</Text>

      <Button
          title="Clique Aqui"
          onPress={handleButton}
      />

      <Text style={style.subtitle}>Televisores em Promoção</Text>

      <TvItem 
          name={'SAMSUNG XL7500M55'} 
          mark={'SAMSUNG'} model={'ZX7500M'} 
          inch={55} 
          price={3000} 
          originalPrice={3500}
          details={['Miniled', 'Sound 40w', '4hdmi', '2 ubs']}
      >
      </TvItem>

      <TvItem 
          name={'LG MT4300X50'} 
          mark={'LG'} 
          model={'MT4300X'} 
          inch={50} 
          price={3000} 
          originalPrice={3000}
          details={['Oled', 'Sound 20w', '3hdmi', '3 ubs']}
      >
      </TvItem>

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

export default twoNineApp
