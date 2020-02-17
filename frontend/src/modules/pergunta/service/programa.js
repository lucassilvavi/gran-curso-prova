import * as service from '../../shared/service/base';

export const buscarBancas = (coOrgao) => service.getRequest(`/programa/banca/orgao/${coOrgao}`);
export const buscarOrgaos = () => service.getRequest('/programa/orgao');
export const buscarAssuntos = (idBanca, idOrgao) => service.getRequest(
  `/programa/assunto/banca/${idBanca}/orgao/${idOrgao}`,
);
