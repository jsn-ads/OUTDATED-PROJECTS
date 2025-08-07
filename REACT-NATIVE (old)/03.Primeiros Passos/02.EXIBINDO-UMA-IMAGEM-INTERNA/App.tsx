import { SafeAreaView, StatusBar, StyleSheet, Text, View, Image, ImageBackground, Button } from 'react-native';

export default function App() {

  // STATES

  // FUNCTIONS
  const handleBuyTicket = () =>{
    alert('ingresso comprado');
  }

  // APP
  return (
    <SafeAreaView>
      <ImageBackground 
        source={require('./assets/w2.png')}
        style={styles.img}
      >
        <StatusBar barStyle="light-content" backgroundColor='#FFF' />
        
        <Text 
          style={styles.title}
        >
          ThreeTwoApp
        </Text>

        <Text 
          style={styles.title}
        >
          EM BREVE NOS CINEMAS
        </Text>

        <Button 
          title='Compre o seu ingresso'
          onPress={handleBuyTicket}
        />
      </ImageBackground>
    </SafeAreaView>
  );
}

// CSS
const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'center',
  },
  title:{
    color:'#FF0000',
    fontSize:20,
    fontWeight:'bold',
    textAlign:'center'
  },
  img:{
    width:'100%',
    height:'100%'
  }
});
