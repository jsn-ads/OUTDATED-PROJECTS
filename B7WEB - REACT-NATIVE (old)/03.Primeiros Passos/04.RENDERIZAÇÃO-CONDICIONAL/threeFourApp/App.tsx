import {SafeAreaView, StatusBar, StyleSheet, Text, TouchableOpacity} from 'react-native';
import React,{useState} from 'react';

export default function App() {

  // STATES
  const [name, setName] = useState('threeFourApp');

  // FUNCTIONS
  const turnIntoUpperCase = (str:string) => {
    return str.toUpperCase();
  }
  // APP
  return (
    <SafeAreaView style={styles.container}>
      
      <StatusBar barStyle="dark-content" backgroundColor="#FFF" />
      <Text style={styles.title}>
        Renderização Condicional
      </Text>
      <Text>
        Aplicativo : {name}
      </Text>

      {name != 'threeFourApp' &&
        <TouchableOpacity style={styles.button} onPress={()=> setName('threeFourApp')}>
        <Text style={styles.buttonText}>LIMPAR</Text>
        </TouchableOpacity>
      }

      {name == 'threeFourApp' &&
        <SafeAreaView style={styles.container}>
          <TouchableOpacity style={styles.button} onPress={()=> setName('Bem Vindo Neto')}>
            <Text style={styles.buttonText}>Opção A</Text>
          </TouchableOpacity>

          <TouchableOpacity style={styles.button} onPress={()=> setName('Bem vinda Cristina')}>
            <Text style={styles.buttonText}>Opção B</Text>
          </TouchableOpacity>

          <TouchableOpacity style={styles.button} onPress={()=> setName('Bem vinda Giovanna')}>
            <Text style={styles.buttonText}>Opção C</Text>
          </TouchableOpacity>
        </SafeAreaView>
      }

  </SafeAreaView>
  );
}

// CSS
const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#FFF',
    alignItems: 'center',
    justifyContent: 'flex-start',
    paddingTop:30
  },
  title:{
    color:'#FF0000',
    fontSize:20,
    fontWeight:'bold',
    textAlign:'center'
  },
  button:{
    backgroundColor: '#007BFF',
    paddingVertical: 10,
    paddingHorizontal: 20,
    borderRadius: 8,
    marginVertical: 5
  },
  buttonText:{
    color: '#FFF',
    fontSize: 16,
    fontWeight: 'bold',
    textAlign: 'center'
  }
});