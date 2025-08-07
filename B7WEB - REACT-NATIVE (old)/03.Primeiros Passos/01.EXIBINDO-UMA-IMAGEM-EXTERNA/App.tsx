import { SafeAreaView, StyleSheet, StatusBar,Text, Image,View } from 'react-native';

export default function App() {

  // STATES

  // FUNCTIONS

  // APP
  return (
    <SafeAreaView>
        <StatusBar barStyle="light-content" backgroundColor='#FFF' />
        <Text style={styles.title}>ThreeOneApp</Text>
        <Image
          style={styles.img}
          source={{ uri: 'https://www.google.com.br/google.jpg'}}
        />
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
    fontSize: 20,
    fontWeight:'bold',
    textAlign:'center'
  },
  img:{
    width:300,
    height:100
  }
});
