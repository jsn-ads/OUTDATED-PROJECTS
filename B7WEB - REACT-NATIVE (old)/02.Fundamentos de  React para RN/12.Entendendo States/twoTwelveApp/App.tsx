import { useState } from 'react';
import { SafeAreaView, StyleSheet, StatusBar, Text, Button} from 'react-native';

export default function App() {

  const [name, setName] = useState('');
  const [lastName, setLastName] = useState('');

  const handleButtonOne = () =>{
    setName('Cristina');
    setLastName('Monik');
  }

  const handleButtonTwo = () =>{
    setName('José');
    setLastName('Neto')
  }

  return (
      <SafeAreaView>

        <StatusBar barStyle="light-content"backgroundColor="#FFF"/>

        <Text style={styles.title}>TwoTwelveApp</Text>

        <Text style={styles.subitle}>Meu nome é {name} {lastName}</Text>

        <Button 
          title='Mudar para Cristina Monik'
          onPress={handleButtonOne}
        />

        <Button 
          title='Mudar para José Neto'
          onPress={handleButtonTwo}
        />

      </SafeAreaView>
  );
}

const styles = StyleSheet.create({
  title:{
    fontSize:24,
    color: '#FF0000',
    textAlign : 'center'
  },
  subitle:{
    fontSize:19,
    color : '#999999',
    textAlign: 'center',
    marginTop: 50,
    marginBottom: 50
  },
  button:{
    padding : 10,
    margin : 10
  },
  container: {
    flex: 1,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'center',
  },
});
